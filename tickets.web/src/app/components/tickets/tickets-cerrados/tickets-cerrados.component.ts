import { Component, OnInit } from '@angular/core';
import {TicketsService} from "../../../services/tickets.service";

@Component({
  selector: 'app-tickets-cerrados',
  templateUrl: './tickets-cerrados.component.html',
  styleUrls: ['./tickets-cerrados.component.css']
})
export class TicketsCerradosComponent implements OnInit {

  ticketsCerrados: any = []

  constructor(private ticketsService: TicketsService) { }

  ngOnInit(): void {
    this.ticketsService.cargarTicketsNuevos().subscribe((response: any) => {
      let { extra } = response
      this.ticketsCerrados = extra
    })
  }

}
