import {Component, OnInit, ViewChild} from '@angular/core';
import {TicketsService} from "../../services/tickets.service";
import {Ticket} from "../../entities/ticket";
import {ApiResponse} from "../../entities/api-response";
import {UtilService} from "../../services/util.service";
import Swal from "sweetalert2";
import {AuthService} from "../../services/auth.service";
import {Usuario} from "../../entities/usuario";

@Component({
  selector: 'app-mis-tickets',
  templateUrl: './mis-tickets.component.html',
  styleUrls: ['./mis-tickets.component.css']
})
export class MisTicketsComponent implements OnInit {

  @ViewChild('area') area: any
  @ViewChild('titulo') titulo: any
  @ViewChild('descripcion') descripcion: any
  misTickets: Ticket[] = []
  userData!: Usuario

  constructor(private ticketsService: TicketsService, public utilService: UtilService, private authService: AuthService) {
    this.userData = this.authService.getUserData()
  }

  ngOnInit(): void {
    this.cargarTicketsCreados()
  }

  cargarTicketsCreados(): any {
    this.ticketsService.cargarMisTickets(this.userData.id).subscribe((response: ApiResponse) => {
      this.misTickets = response.extra
    })
  }

  guardarTicket(): any {
    const ticket: any = {}
    ticket.area_id = this.area.nativeElement.value
    ticket.titulo = this.titulo.nativeElement.value
    ticket.descripcion = this.descripcion.nativeElement.value
    ticket.usuario_id = this.userData.id
    this.ticketsService.crearTicket(ticket).subscribe((response: ApiResponse) => {
      let { type, message } = response
      if (type === 'error') {
        Swal.fire({
          icon: 'error',
          title: 'No se pudo crear el ticket',
          text: message
        })

        return
      }

      Swal.fire({
        icon: 'success',
        title: 'Aviso',
        text: message
      })

      this.area.nativeElement.value = ''
      this.titulo.nativeElement.value = ''
      this.descripcion.nativeElement.value = ''

      this.cargarTicketsCreados();
    })
  }
}
