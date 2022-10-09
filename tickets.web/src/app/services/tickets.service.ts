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
}
