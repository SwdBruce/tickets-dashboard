import {Component, Input, OnInit} from '@angular/core';
import {TicketsService} from "../../../services/tickets.service";
import Swal from "sweetalert2";
import {Ticket} from "../../../entities/ticket";
import {ApiResponse} from "../../../entities/api-response";

@Component({
  selector: 'app-tickets-nuevos',
  templateUrl: './tickets-nuevos.component.html',
  styleUrls: ['./tickets-nuevos.component.css']
})
export class TicketsNuevosComponent implements OnInit {

  @Input() hideProcesarButton: boolean = false
  ticketsNuevos: Ticket[] = []
  ticketSeleccionado: Ticket = new Ticket()

  constructor(private ticketsService: TicketsService) { }

  ngOnInit(): void {
    this.cargarTicketsNuevos()
  }

  cargarTicketsNuevos(): any {
    this.ticketsService.cargarTicketsNuevos().subscribe((response: ApiResponse) => {
      let { extra } = response
      this.ticketsNuevos = extra
    })
  }

  verDetalleTicket(ticket: Ticket): any {
    this.ticketSeleccionado = ticket
  }

  procesarTickets(id?: number): any {
    this.ticketsService.procesarTicket(id).subscribe((response: ApiResponse) => {
      this.cargarTicketsNuevos()
      // Swal.fire({
      //   title: 'Tickets procesados',
      //   text: id ? 'El ticket #' + id + ' ha sido procesado' : 'Los tickets han sido procesados',
      // })
    }, (error: any) => {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Ocurrió un error al procesar los tickets',
      })
    })
  }
}
