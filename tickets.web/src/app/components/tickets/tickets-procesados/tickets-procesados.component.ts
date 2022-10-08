import { Component, OnInit } from '@angular/core';
import {TicketsService} from "../../../services/tickets.service";

@Component({
  selector: 'app-tickets-procesados',
  templateUrl: './tickets-procesados.component.html',
  styleUrls: ['./tickets-procesados.component.css']
})
export class TicketsProcesadosComponent implements OnInit {

  ticketsProcesados: any = []

  constructor(private ticketsService: TicketsService) { }

  ngOnInit(): void {
    this.ticketsService.cargarTicketsProcesados().subscribe((response: any) => {
      let { extra } = response
      this.ticketsProcesados = extra
    })
  }

}
