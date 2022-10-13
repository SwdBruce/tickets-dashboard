import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {environment} from "../../environments/environment";
import {ApiResponse} from "../entities/api-response";
import Swal from "sweetalert2";

@Injectable({
  providedIn: 'root'
})
export class TicketsService {

  baseUrl:string = environment.baseUrl

  constructor(private http: HttpClient) { }

  estadisticasGlobales(): any {
    return this.http.get<ApiResponse>(`${ this.baseUrl }/estadisticas-globales`)
  }

  cargarTicketsNuevos(): any {
    return this.http.get<ApiResponse>(`${ this.baseUrl }/tickets/nuevos`)
  }

  cargarTicketsProcesados(): any {
    return this.http.get<ApiResponse>(`${ this.baseUrl }/tickets/procesados`)
  }

  cargarTicketsCerrados(): any {
    return this.http.get<ApiResponse>(`${ this.baseUrl }/tickets/cerrados`)
  }

  procesarTicket(id?: number): any {
    Swal.fire({
      title: 'Procesando ' + (id ? 'ticket #' + id : 'tickets'),
      text: 'Por favor espere...',
      timer: 4000,
      didOpen: () => {
        Swal.showLoading()
      }
    })
    let uri = !id ? `procesar` : `procesar/${ id }`
    return this.http.get<ApiResponse>(`${ this.baseUrl }/tickets/${ uri }`)
  }

  cerrarTicket(id: number): any {
    return this.http.get<ApiResponse>(`${ this.baseUrl }/tickets/cerrar/${ id }`)
  }

  editarTicket(id: number, ticket: any): any {
    return this.http.put<ApiResponse>(`${ this.baseUrl }/tickets/${ id }`, {
      titulo: ticket.titulo, // el titulo es requerido
      asignado_id: ticket.asignado_id,
      categoria_id: ticket.categoria_id,
      urgencia_id: ticket.urgencia_id,
      impacto_id: ticket.impacto_id
    })
  }
}
