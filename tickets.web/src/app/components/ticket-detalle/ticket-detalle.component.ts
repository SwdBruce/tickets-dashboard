import {Component, Input, OnInit} from '@angular/core';
import {Ticket} from "../../entities/ticket";
import {ApiResponse} from "../../entities/api-response";
import {UsuarioService} from "../../services/usuario.service";
import {Usuario} from "../../entities/usuario";

@Component({
  selector: 'app-ticket-detalle',
  templateUrl: './ticket-detalle.component.html',
  styleUrls: ['./ticket-detalle.component.css']
})
export class TicketDetalleComponent implements OnInit {

  @Input() ticket: Ticket = new Ticket()
  @Input() readOnly: boolean = true
  @Input() nombreFormulario: string = 'Ticket'
  usuariosSoporte: Usuario[] = []

  constructor(private usuarioService: UsuarioService) { }

  ngOnInit(): void {
    this.cargarUsuariosSoporte()
  }

  ngAfterViewInit(): void {

  }

  cargarUsuariosSoporte(): any {
    this.usuarioService.cargarUsuariosSoporte().subscribe((response: ApiResponse) => {
      let { extra } = response
      this.usuariosSoporte = extra
    })
  }
}
