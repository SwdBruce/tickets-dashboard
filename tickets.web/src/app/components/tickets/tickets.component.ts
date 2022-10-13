import { Component, OnInit } from '@angular/core';
import {ApiResponse} from "../../entities/api-response";
import {TicketsService} from "../../services/tickets.service";
import {Ticket} from "../../entities/ticket";
import {UsuarioService} from "../../services/usuario.service";
import {Usuario} from "../../entities/usuario";
declare var bootstrap: any

@Component({
  selector: 'app-tickets',
  templateUrl: './tickets.component.html',
  styleUrls: ['./tickets.component.css']
})
export class TicketsComponent implements OnInit {

  ticketsNuevos: Ticket[] = []
  ticketsCerrados: Ticket[] = []
  ticketsProcesados: Ticket[] = []
  usuariosSoporte: Usuario[] = []

  constructor(private ticketsService: TicketsService, private usuarioService: UsuarioService) { }

  ngOnInit(): void {
    this.cargarTicketsNuevos()
    this.cargarTicketsProcesados()
    this.cargarTicketsCerrados()
    this.cargarUsuariosSoporte()

    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  }

  cargarTicketsNuevos(): any {
    this.ticketsService.cargarTicketsNuevos().subscribe((response: ApiResponse) => {
      let { extra } = response
      this.ticketsNuevos = extra
    })
  }

  cargarTicketsProcesados(): any {
    this.ticketsService.cargarTicketsProcesados().subscribe((response: any) => {
      let { extra } = response
      this.ticketsProcesados = extra
    })
  }

  cargarTicketsCerrados(): any {
    this.ticketsService.cargarTicketsCerrados().subscribe((response: any) => {
      let { extra } = response
      this.ticketsCerrados = extra
    })
  }

  obtenerActualizacionTickets(ticketsActualizados: boolean): any {
    this.cargarTicketsNuevos()
    this.cargarTicketsProcesados()
    this.cargarTicketsCerrados()
  }

  cargarUsuariosSoporte(): any {
    this.usuarioService.cargarUsuariosSoporte().subscribe((response: ApiResponse) => {
      let { extra } = response
      this.usuariosSoporte = extra
    })
  }
}
