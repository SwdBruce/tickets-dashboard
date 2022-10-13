import { Component, OnInit } from '@angular/core';
import {AuthService} from "../../services/auth.service";
import {Usuario} from "../../entities/usuario";
import {UtilService} from "../../services/util.service";

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {

  userData!: Usuario
  admin: number = UtilService.USER_ADMIN
  cliente: number = UtilService.USER_CLIENTE

  constructor(private authService: AuthService, public utilService: UtilService) {
    this.userData = this.authService.getUserData()
  }

  ngOnInit(): void {
  }

}
