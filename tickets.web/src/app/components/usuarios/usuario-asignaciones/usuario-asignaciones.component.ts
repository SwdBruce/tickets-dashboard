import {Component, Input, OnInit} from '@angular/core';
import {Ticket} from "../../../entities/ticket";
import {Usuario} from "../../../entities/usuario";

@Component({
  selector: 'app-usuario-asignaciones',
  templateUrl: './usuario-asignaciones.component.html',
  styleUrls: ['./usuario-asignaciones.component.css']
})
export class UsuarioAsignacionesComponent implements OnInit {

  @Input() ticketsAsignados: Ticket[] = []

  constructor() { }

  ngOnInit(): void {
  }
}
