import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {environment} from "../../environments/environment";

@Injectable({
  providedIn: 'root'
})
export class TicketsService {

  baseUrl:string = environment.baseUrl;

  constructor(private http: HttpClient) { }

  estadisticasGlobales(): any {
    return this.http.get(`${ this.baseUrl }/estadisticas-globales`)
  }

  cargarTicketsNuevos(): any {
    return this.http.get(`${ this.baseUrl }/tickets-nuevos`)
  }

  cargarTicketsProcesados(): any {
    return this.http.get(`${ this.baseUrl }/tickets-procesados`)
  }

  cargarTicketsCerrados(): any {
    return this.http.get(`${ this.baseUrl }/tickets-cerrados`)
  }
}
