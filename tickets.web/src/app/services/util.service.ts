import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class UtilService {

  static USER_ADMIN = 1
  static USER_SOPORTE = 2
  static USER_CLIENTE = 3
  static TICKET_CREADO = 1
  static TICKET_CERRADO = 0
  static TICKET_PROCESADO = 2

  constructor() { }

  ticketEstadoDescripcion(estado: number): string {
    switch (estado) {
      case 1:
        return 'Creado'
      case 2:
        return 'Procesado'
      case 0:
        return 'Cerrado'
      default:
        return 'Desconocido'
    }
  }

  ticketEstadoColor(estado: number): string {
    switch (estado) {
      case 1:
        return 'orange'
      case 2:
        return 'blue'
      case 0:
        return 'green'
      default:
        return 'secondary'
    }
  }

  areaNombre(area_id: number): string {

    switch (area_id) {
      case 1:
        return 'Administrativa'
      case 2:
        return 'Soporte'
      case 3:
        return 'Comercial'
      case 4:
        return 'Operaciones'
      case 5:
        return 'Sistemas'
      case 6:
        return 'Recursos Humanos'
      default:
        return 'Desconocido'
    }
  }
}
