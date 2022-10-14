import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {TicketsService} from "../../../services/tickets.service";
import Swal from "sweetalert2";
import {Ticket} from "../../../entities/ticket";
import {ApiResponse} from "../../../entities/api-response";
import {Usuario} from "../../../entities/usuario";

@Component({
  selector: 'app-tickets-nuevos',
  templateUrl: './tickets-nuevos.component.html',
  styleUrls: ['./tickets-nuevos.component.css']
})
export class TicketsNuevosComponent implements OnInit {

  @Output() notificarActualizacionTickets: EventEmitter<boolean> = new EventEmitter<boolean>()
  @Input() hideProcesarButton: boolean = false
  @Input() ticketsNuevos: Ticket[] = []
  @Input() requiereCargarTicketsNuevos: boolean = false
  @Input() usuariosSoporte: Usuario[] = []

  constructor(private ticketsService: TicketsService) { }

  ngOnInit(): void {
    if (this.requiereCargarTicketsNuevos) {
      this.cargarTicketsNuevos()
    }
  }

  cargarTicketsNuevos(): any {
    this.ticketsService.cargarTicketsNuevos().subscribe((response: ApiResponse) => {
      let { extra } = response
      this.ticketsNuevos = extra
    })
  }

  procesarTickets(id?: number): any {
    this.ticketsService.procesarTicket(id).subscribe((response: ApiResponse) => {
      this.actualizandoTickets()
      Swal.fire({
        title: 'Tickets procesados',
        text: id ? 'El ticket #' + id + ' ha sido procesado' : 'Los tickets han sido procesados',
      })
    }, (error: any) => {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Ocurrió un error al procesar los tickets',
      })
    })
  }

  cerrarTicket(id: number): any {
    this.ticketsService.cerrarTicket(id).subscribe((response: ApiResponse) => {
      if (this.requiereCargarTicketsNuevos) {
        this.cargarTicketsNuevos()
      } else {
        this.actualizandoTickets()
      }

      Swal.fire({
        title: 'Ticket cerrado',
        text: 'El ticket #' + id + ' ha sido cerrado',
      })
    }, (error: any) => {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Ocurrió un error al cerrar el ticket',
      })
    })
  }

  actualizandoTickets(): any {
    this.notificarActualizacionTickets.emit(true)
  }
}
