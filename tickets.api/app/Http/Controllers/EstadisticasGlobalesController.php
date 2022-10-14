<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\TicketModel;

class EstadisticasGlobalesController extends Controller
{
    public function index()
    {
        $totalTickets = TicketModel::count();
        $ticketsCerrados = TicketModel::where('estado', TicketModel::CERRADO)->count();
        $ticketsNuevos = TicketModel::where('estado', TicketModel::CREADO)->count();
        $ticketsProcesados = TicketModel::where('estado', TicketModel::PROCESADO)->count();

        $incidenciasPorDia = TicketModel::where('categoria_id', TicketModel::INCIDENCIA)->get()->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->fecha_creacion_txt)->format('Y-m-d');
        })->map(function($item, $key) {
            return count($item);
        });

        $consultasPorDia = TicketModel::where('categoria_id', TicketModel::CONSULTA)->get()->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->fecha_creacion_txt)->format('Y-m-d');
        })->map(function($item, $key) {
            return count($item);
        });

        $generalPorDia = TicketModel::where('categoria_id', TicketModel::GENERAL)->get()->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->fecha_creacion_txt)->format('Y-m-d');
        })->map(function($item, $key) {
            return count($item);
        });

        // valores
        $incidenciasPorDia = $incidenciasPorDia->sortKeys();
        $incidenciasPorDiaValues = $incidenciasPorDia->values();
        $consultasPorDia = $consultasPorDia->sortKeys();
        $consultasPorDiaValues = $consultasPorDia->values();
        $generalPorDia = $generalPorDia->sortKeys();
        $generalPorDiaValues = $generalPorDia->values();
        // obtener fechas unicas
        $fechasUnicas = $incidenciasPorDia->keys()->merge($consultasPorDia->keys())->merge($generalPorDia->keys())->unique()->sort();

        $totalIncidentes = TicketModel::where('categoria_id', TicketModel::INCIDENCIA)->count();
        $totalConsultas = TicketModel::where('categoria_id', TicketModel::CONSULTA)->count();
        $totalGeneral = TicketModel::where('categoria_id', TicketModel::GENERAL)->count();

        // obtener porcentajes
        $porcentajeIncidentes = round($totalIncidentes / $totalTickets * 100, 2);
        $porcentajeConsultas = round($totalConsultas / $totalTickets * 100, 2);
        $porcentajeGeneral = round($totalGeneral / $totalTickets * 100, 2);

        // dar formato con coma
        $totalIncidentes = number_format($totalIncidentes, 0, ' ', ' ');
        $totalConsultas = number_format($totalConsultas, 0, ' ', ' ');
        $totalGeneral = number_format($totalGeneral, 0, ' ', ' ');
        $totalTickets = number_format($totalTickets, 0, ' ', ' ');
        $ticketsCerrados = number_format($ticketsCerrados, 0, ' ', ' ');
        $ticketsNuevos = number_format($ticketsNuevos, 0, ' ', ' ');
        $ticketsProcesados = number_format($ticketsProcesados, 0, ' ', ' ');

        return response()->success('Estadisticas globales', [
            'total_tickets' => $totalTickets,
            'tickets_cerrados' => $ticketsCerrados,
            'tickets_nuevos' => $ticketsNuevos,
            'tickets_procesados' => $ticketsProcesados,
            'total_incidentes' => $totalIncidentes,
            'total_consultas' => $totalConsultas,
            'total_general' => $totalGeneral,
            'tickets_performance' => [
                'incidencias' => $incidenciasPorDiaValues,
                'consultas' => $consultasPorDiaValues,
                'general' => $generalPorDiaValues,
                'fechas' => $fechasUnicas
            ],
            'porcentajes' => [
                'incidentes' => $porcentajeIncidentes,
                'consultas' => $porcentajeConsultas,
                'general' => $porcentajeGeneral
            ]
        ]);
    }

    public function ticketsNuevos()
    {
        $ticketsNuevos = TicketModel::where('estado', TicketModel::CREADO)->orderBy('created_at', 'DESC')->get()->take(20)->map(function ($ticket) {
            $ticket->usuario;
            $ticket->asignado;
            return $ticket;
        });

        return response()->success('Tickets nuevos', $ticketsNuevos->toArray());
    }

    public function ticketsProcesados()
    {
        //ultimos 20 tickets
        $ticketsProcesados = TicketModel::where('estado', TicketModel::PROCESADO)->orderBy('updated_at', 'DESC')->get()->take(20)->map(function ($ticket) {
            $ticket->usuario;
            $ticket->asignado;
            $ticket->categoria;
            $ticket->impacto;
            $ticket->urgencia;
            return $ticket;
        });

        return response()->success('Tickets procesados', $ticketsProcesados->toArray());
    }

    public function ticketsCerrados()
    {
        //ultimos 20 tickets
        $ticketsProcesados = TicketModel::where('estado', TicketModel::CERRADO)->orderBy('updated_at', 'DESC')->get()->take(20)->map(function ($ticket) {
            $ticket->usuario;
            $ticket->asignado;
            $ticket->categoria;
            $ticket->impacto;
            $ticket->urgencia;
            return $ticket;
        });

        return response()->success('Tickets cerrados', $ticketsProcesados->toArray());
    }
}
