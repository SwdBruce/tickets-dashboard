import { Component, OnInit } from '@angular/core';
import {TicketsService} from "../../services/tickets.service";
declare var ApexCharts: any
declare var tabler: any
declare var window: any

@Component({
  selector: 'app-initio',
  templateUrl: './inicio.component.html',
  styleUrls: ['./inicio.component.css']
})
export class InicioComponent implements OnInit {

  linealChart: any
  pieChart: any
  estadisticasGlobales: any
  cargandoEstadisticas: boolean = true

  constructor(private ticketsService: TicketsService) {
    this.cargarEstadisticasGlobales()
  }

  ngOnInit(): void {

  }

  cargarEstadisticasGlobales(): any {
    this.ticketsService.estadisticasGlobales().subscribe((response: any) => {
      let { extra } = response
      this.estadisticasGlobales = extra
      this.cargandoEstadisticas = false
      this.loadScript()
    })
  }

  loadScript() {
    if (this.linealChart) {
      this.linealChart.destroy()
    }

    if (this.pieChart) {
      this.pieChart.destroy()
    }

    window.ApexCharts && (this.linealChart = new ApexCharts(document.getElementById('chart-line'), {
        chart: {
          type: "line",
          fontFamily: 'inherit',
          height: 288,
          parentHeightOffset: 0,
          toolbar: {
            show: false,
          },
          animations: {
            enabled: false
          },
        },
        fill: {
          opacity: 1,
        },
        stroke: {
          width: 2,
          lineCap: "round",
          curve: "smooth",
        },
        series: [{
          name: "Incidencia",
          data: this.estadisticasGlobales.tickets_performance.incidencias
        },{
          name: "Consulta",
          data: this.estadisticasGlobales.tickets_performance.consultas
        },{
          name: "General",
          data: this.estadisticasGlobales.tickets_performance.general
        }],
        grid: {
          padding: {
            top: -20,
            right: 0,
            left: -4,
            bottom: -4
          },
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0,
          },
          tooltip: {
            enabled: true
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: this.estadisticasGlobales.tickets_performance.fechas,
        colors: [tabler.getColor("danger"), tabler.getColor("primary"), tabler.getColor("green")],
        legend: {
          show: false,
        },
      })).render()

    window.ApexCharts && (this.pieChart = new ApexCharts(document.getElementById('chart-pie'), {
        chart: {
          type: "donut",
          fontFamily: 'inherit',
          height: 278,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        fill: {
          opacity: 1,
        },
        series: [
          this.estadisticasGlobales.porcentajes.incidentes,
          this.estadisticasGlobales.porcentajes.consultas,
          this.estadisticasGlobales.porcentajes.general
        ],
        labels: ["Incidencia", "Consulta", "General"],
        grid: {
          strokeDashArray: 4,
        },
        colors: [tabler.getColor("danger"), tabler.getColor("primary"), tabler.getColor("success")],
        legend: {
          show: true,
          position: 'top',
          offsetY: 12,
          markers: {
            width: 10,
            height: 10,
            radius: 100,
          },
          itemMargin: {
            horizontal: 8,
            vertical: 8
          },
        },
        tooltip: {
          fillSeriesColor: false
        },
      })).render()
  }

  ngOnDestroy() {
    if (this.linealChart) {
      this.linealChart.destroy()
    }

    if (this.pieChart) {
      this.pieChart.destroy()
    }
  }
}
