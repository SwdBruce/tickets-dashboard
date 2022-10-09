import { Injectable } from '@angular/core';
import {environment} from "../../environments/environment";
import {HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class UsuarioService {

  baseUrl:string = environment.baseUrl

  constructor(private http: HttpClient) { }

  cargarUsuariosSoporte(): any {
    return this.http.get(`${ this.baseUrl }/usuario?tipo=soporte`)
  }

  cargarUsuariosCliente(): any {
    return this.http.get(`${ this.baseUrl }/usuario?tipo=usuario`)
  }
}
