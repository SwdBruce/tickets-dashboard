import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {Usuario} from "../../../entities/usuario";

@Component({
  selector: 'app-tickets-cerrados',
  templateUrl: './tickets-cerrados.component.html',
  styleUrls: ['./tickets-cerrados.component.css']
})
export class TicketsCerradosComponent implements OnInit {

  @Output() notificarActualizacionTickets: EventEmitter<boolean> = new EventEmitter<boolean>()
  @Input() ticketsCerrados: any = []
  @Input() usuariosSoporte: Usuario[] = []

  constructor() { }

  ngOnInit(): void { }

  actualizandoTickets(): any {
    this.notificarActualizacionTickets.emit(true)
  }
}
