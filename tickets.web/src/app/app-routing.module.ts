import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { InicioComponent } from "./components/inicio/inicio.component";
import { UsuariosComponent } from "./components/usuarios/usuarios.component";
import { TicketsComponent } from "./components/tickets/tickets.component";
import {LoginComponent} from "./components/login/login.component";
import {DashboardComponent} from "./components/dashboard/dashboard.component";
import {MisTicketsComponent} from "./components/mis-tickets/mis-tickets.component";
import {AuthGuard} from "./guards/auth.guard";

const routes: Routes = [
  {
    path: 'login', component: LoginComponent
  },
  {
    path: 'dashboard', component: DashboardComponent, children: [
      { path: 'inicio', component: InicioComponent, canActivate: [AuthGuard] },
      { path: 'usuarios', component: UsuariosComponent, canActivate: [AuthGuard] },
      { path: 'tickets', component: TicketsComponent, canActivate: [AuthGuard] },
      { path: 'mis-tickets', component: MisTicketsComponent, canActivate: [AuthGuard] },
      {
        path: '**', redirectTo: 'dashboard/inicio'
      }
    ]
  },
  {
    path: '**', redirectTo: 'login'
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
