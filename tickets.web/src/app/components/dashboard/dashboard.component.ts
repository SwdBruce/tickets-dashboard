import { Component, OnInit } from '@angular/core';
import {AuthService} from "../../services/auth.service";
import {Usuario} from "../../entities/usuario";

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  userData!: Usuario

  constructor(private authService: AuthService) {
    this.userData = this.authService.getUserData()
  }

  ngOnInit(): void {
  }

}
