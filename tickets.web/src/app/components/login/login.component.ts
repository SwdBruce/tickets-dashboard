import { Component, OnInit } from '@angular/core';
import {Router} from "@angular/router";
import Swal from 'sweetalert2';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  username:string = ''
  password:string = ''

  constructor(private router: Router) { }

  ngOnInit(): void {
  }

  redirectToDashboard() {
    if (this.username == 'admin' && this.password == 'admin') {
      this.router.navigate(['/dashboard/inicio'])
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Usuario o contraseña incorrectos!',
      })
    }
  }

}
