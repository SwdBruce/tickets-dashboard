import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { InicioComponent } from './components/inicio/inicio.component';
import { SidebarComponent } from './components/sidebar/sidebar.component';
import { UsuariosComponent } from './components/usuarios/usuarios.component';
import { TicketsComponent } from './components/tickets/tickets.component';
import { TicketsNuevosComponent } from './components/tickets/tickets-nuevos/tickets-nuevos.component';
import { TicketsProcesadosComponent } from './components/tickets/tickets-procesados/tickets-procesados.component';
import { TicketsCerradosComponent } from './components/tickets/tickets-cerrados/tickets-cerrados.component';
import { LoginComponent } from './components/login/login.component';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import {FormsModule} from "@angular/forms";
import {HttpClientModule} from "@angular/common/http";
import { TicketDetalleComponent } from './components/ticket-detalle/ticket-detalle.component';
import { UsuarioAsignacionesComponent } from './components/usuarios/usuario-asignaciones/usuario-asignaciones.component';

@NgModule({
  declarations: [
    AppComponent,
    InicioComponent,
    SidebarComponent,
    UsuariosComponent,
    TicketsComponent,
    TicketsNuevosComponent,
    TicketsProcesadosComponent,
    TicketsCerradosComponent,
    LoginComponent,
    DashboardComponent,
    TicketDetalleComponent,
    UsuarioAsignacionesComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
