import { Component, OnInit } from '@angular/core';
import {Router} from "@angular/router";
import Swal from 'sweetalert2';
import {AuthService} from "../../services/auth.service";

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  username:string = ''
  password:string = ''

  constructor(private router: Router, private authService: AuthService) {
    this.authService.doLogout(false)
  }

  ngOnInit(): void {
  }

  login() {
    this.authService.login(this.username, this.password).subscribe((response: any) => {
      let { type, message, extra } = response
      if (type === 'error') {
        Swal.fire({
          icon: 'error',
          title: 'No se pudo iniciar sesión',
          text: message
        })

        return
      }

      localStorage.setItem('access_token', extra.token)
      let user = this.authService.getUserData()
      if (user.rol_id === 1) {
        this.router.navigate(['/dashboard/inicio']);
      } else {
        this.router.navigate(['/dashboard/mis-tickets']);
      }
    })
  }

}
