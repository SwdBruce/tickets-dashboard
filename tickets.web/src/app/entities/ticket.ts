import { Usuario } from "./usuario";

export class Ticket {
  id: number = 0
  titulo: string = ''
  descripcion: string = ''
  area_id: number = 0
  usuario_id: number = 0
  asignado_id: number = 0
  tipo: number = 0
  categoria_id: number = 0
  urgencia: number = 0
  impacto: number = 0
  estado: number = 0
  fecha_creacion_txt: string = ''
  created_at: any
  updated_at: any
  usuario: Usuario = new Usuario()
  asignado: Usuario = new Usuario()
}
