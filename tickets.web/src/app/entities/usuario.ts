import { Area } from "./area";
import { Rol } from "./rol";

export class Usuario {
  id: number = 0
  username: string = ''
  apellidos: string = ''
  nombres: string = ''
  sexo: number = 0
  estado: number = 0
  rol_id: number = 0
  area_id: number = 0
  created_at:any = null
  updated_at:any = null
  area: Area = new Area()
  rol: Rol = new Rol()
}
