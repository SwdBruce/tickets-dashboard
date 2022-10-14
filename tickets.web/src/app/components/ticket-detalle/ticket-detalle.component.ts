import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {Ticket} from "../../entities/ticket";
import {ApiResponse} from "../../entities/api-response";
import {UsuarioService} from "../../services/usuario.service";
import {Usuario} from "../../entities/usuario";
import {TicketsService} from "../../services/tickets.service";
import Swal from "sweetalert2";
import {UtilService} from "../../services/util.service";

@Component({
  selector: 'app-ticket-detalle',
  templateUrl: './ticket-detalle.component.html',
  styleUrls: ['./ticket-detalle.component.css']
})
export class TicketDetalleComponent implements OnInit {

  @Input() ticket: Ticket = new Ticket()
  @Input() readOnly: boolean = true
  @Input() nombreFormulario: string = 'Ticket'
  @Input() modalId: string = 'modal-ticket-detalle'
  @Input() usuariosSoporte: Usuario[] = []
  @Input() tipo: string = 'none'
  @Output() ticketProcesadoActualizadoNotificacion: EventEmitter<boolean> = new EventEmitter<boolean>()
  asignadoId: number = 0
  categoriaId: number = 0
  urgenciaId: number = 0
  impactoId: number = 0

  constructor(private usuarioService: UsuarioService, private ticketService: TicketsService, private utilService: UtilService) { }

  ngOnInit(): void { }

  setAsignadoId(event: any): any {
    this.asignadoId = event.target.value
  }

  setCategoriaId(event: any): any {
    this.categoriaId = event.target.value
  }

  setUrgencia(event: any): any {
    this.urgenciaId = event.target.value
  }

  setImpacto(event: any): any {
    this.impactoId = event.target.value
  }

  ticketProcesadoActualizado(): any {
    this.ticketProcesadoActualizadoNotificacion.emit(true)
  }

  areaNombre(areaId: number): string {
    return this.utilService.areaNombre(areaId)
  }

  editarTicket(ticket: Ticket): any {
    ticket.asignado_id = this.asignadoId
    ticket.categoria_id = this.categoriaId
    ticket.urgencia_id = this.urgenciaId
    ticket.impacto_id = this.impactoId
    this.ticketService.editarTicket(ticket.id, ticket).subscribe((response: ApiResponse) => {
      let {type, message, extra} = response
      if (type === 'error') {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: message,
        })

        return
      }

      Swal.fire({
        title: 'Ticket actualizado',
        text: `Ticket #${ ticket.id } actualizado con éxito`,
        icon: 'success',
        confirmButtonText: 'Aceptar'
      })

      this.ticketProcesadoActualizado()
    }, (error: any) => {
      Swal.fire({
        title: 'Error al actualizar ticket',
        text: error.error.message,
        icon: 'error',
        confirmButtonText: 'Aceptar'
      })
    })
  }
}
