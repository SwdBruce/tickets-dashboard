import { Component, OnInit } from '@angular/core';
import {UsuarioService} from "../../services/usuario.service";
import {Usuario} from "../../entities/usuario";
import {ApiResponse} from "../../entities/api-response";

@Component({
  selector: 'app-usuarios',
  templateUrl: './usuarios.component.html',
  styleUrls: ['./usuarios.component.css']
})
export class UsuariosComponent implements OnInit {

  usuariosSoporte: Usuario[] = []
  usuariosCliente: Usuario[] = []

  constructor(private usuarioService: UsuarioService) { }

  ngOnInit(): void {
    this.cargarUsuariosSoporte()
    this.cargarUsuariosCliente()
  }

  cargarUsuariosSoporte(): any {
    this.usuarioService.cargarUsuariosSoporte().subscribe((response: ApiResponse) => {
      let { extra } = response
      this.usuariosSoporte = extra
    })
  }

  cargarUsuariosCliente(): any {
    this.usuarioService.cargarUsuariosCliente().subscribe((response: ApiResponse) => {
      let { extra } = response
      this.usuariosCliente = extra
    })
  }

}
