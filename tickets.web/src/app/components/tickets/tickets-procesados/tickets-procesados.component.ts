import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {Ticket} from "../../../entities/ticket";
import {Usuario} from "../../../entities/usuario";
import {ApiResponse} from "../../../entities/api-response";
import Swal from "sweetalert2";
import {TicketsService} from "../../../services/tickets.service";

@Component({
  selector: 'app-tickets-procesados',
  templateUrl: './tickets-procesados.component.html',
  styleUrls: ['./tickets-procesados.component.css']
})
export class TicketsProcesadosComponent implements OnInit {

  @Output() notificarActualizacionTickets: EventEmitter<boolean> = new EventEmitter<boolean>()
  @Input() ticketsProcesados: Ticket[] = []
  @Input() usuariosSoporte: Usuario[] = []

  constructor(private ticketsService: TicketsService) { }

  ngOnInit(): void { }

  actualizandoTickets(): any {
    this.notificarActualizacionTickets.emit(true)
  }

  cerrarTicket(id: number): any {
    this.ticketsService.cerrarTicket(id).subscribe((response: ApiResponse) => {
      this.actualizandoTickets()

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

  ticketActualizado(actualizado: boolean): any {
    if (actualizado) {
      this.ticketsService.cargarTicketsProcesados().subscribe((response: ApiResponse) => {
        this.ticketsProcesados = response.extra
      })
    }
  }
}
