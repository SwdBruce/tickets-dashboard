import {Component, Input, OnInit} from '@angular/core';
import {TicketsService} from "../../../services/tickets.service";
import Swal from "sweetalert2";

@Component({
  selector: 'app-tickets-nuevos',
  templateUrl: './tickets-nuevos.component.html',
  styleUrls: ['./tickets-nuevos.component.css']
})
export class TicketsNuevosComponent implements OnInit {

  @Input() hideProcessarButton: boolean = false

  ticketsNuevos: any = []

  constructor(private ticketsService: TicketsService) { }

  ngOnInit(): void {
    this.ticketsService.cargarTicketsNuevos().subscribe((response: any) => {
      let { extra } = response
      this.ticketsNuevos = extra
    })
  }

  procesarTicket(): any {
    // crear modal de carga que dura 4 segundos
    Swal.fire({
      title: 'Procesando ticket',
      text: 'Por favor espere...',
      timer: 4000,
      didOpen: () => {
        Swal.showLoading()
      }
    })
  }

}
