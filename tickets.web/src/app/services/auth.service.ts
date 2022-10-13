import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router';
import { environment } from "../../environments/environment";
import {ApiResponse} from "../entities/api-response";

@Injectable({
  providedIn: 'root'
})

export class AuthService {
  baseUrl: string = environment.baseUrl;
  headers = new HttpHeaders().set('Content-Type', 'application/json');
  currentUser = {};

  constructor(private http: HttpClient, public router: Router) { }

  login(username: string, password: string) {
    return this.http.post<ApiResponse>(`${this.baseUrl}/login`, {username: username, password: password})
  }

  getToken() {
    return localStorage.getItem('access_token');
  }

  get isLoggedIn(): boolean {
    let authToken = localStorage.getItem('access_token')
    return authToken !== null
  }

  doLogout(redirect: boolean = true) {
    localStorage.removeItem('access_token')
    localStorage.removeItem('sso_info')
    localStorage.removeItem('menu_data')
    localStorage.removeItem('menu_status')
    if (redirect) {
      this.router.navigate(['/login'])
    }
  }

  getUserData() {
    let token = String(this.getToken())
    let array = token.split('.')
    let parseData = JSON.parse(atob(array[1]))

    return parseData.user_data ? parseData.user_data : null
  }
}
