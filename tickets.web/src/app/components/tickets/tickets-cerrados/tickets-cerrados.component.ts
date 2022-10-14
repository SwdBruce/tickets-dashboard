import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {Usuario} from "../../../entities/usuario";
import {Ticket} from "../../../entities/ticket";

@Component({
  selector: 'app-tickets-cerrados',
  templateUrl: './tickets-cerrados.component.html',
  styleUrls: ['./tickets-cerrados.component.css']
})
export class TicketsCerradosComponent implements OnInit {

  @Output() notificarActualizacionTickets: EventEmitter<boolean> = new EventEmitter<boolean>()
  @Input() ticketsCerrados: Ticket[] = []
  @Input() usuariosSoporte: Usuario[] = []

  constructor() { }

  ngOnInit(): void { }

  actualizandoTickets(): any {
    this.notificarActualizacionTickets.emit(true)
  }
}
