<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    /**
     * Create a new lead.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createLead(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'source' => 'required|string',
            'owner' => 'required|exists:users,id',
        ]);

        $lead = Lead::create([
            'name' => $request->name,
            'source' => $request->source,
            'owner' => $request->owner,
            'created_by' => Auth::id(),
        ]);

        return response()->json([
            'meta' => [
                'success' => true,
                'errors' => [],
            ],
            'data' => [
                'id' => $lead->id,
                'name' => $lead->name,
                'source' => $lead->source,
                'owner' => $lead->owner,
                'created_at' => $lead->created_at,
                'created_by' => $lead->created_by,
            ],
        ], 201);
    }

    /**
     * Get a lead.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLead($id)
    {
        $lead = Lead::find($id);

        if (!$lead) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'errors' => ['No lead found'],
                ],
            ], 404);
        }

        return response()->json([
            'meta' => [
                'success' => true,
                'errors' => [],
            ],
            'data' => [
                'id' => $lead->id,
                'name' => $lead->name,
                'source' => $lead->source,
                'owner' => $lead->owner,
                'created_at' => $lead->created_at,
                'created_by' => $lead->created_by,
            ],
        ], 200);
    }

    /**
     * Get all leads.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllLeads()
    {
        try {
            // Obtener todos los leads asignados al agente o todos los leads si el usuario es un manager
            $leads = Auth::user()->role === 'manager' ? Lead::all() : Auth::user()->leads;

            return response()->json([
                'meta' => [
                    'success' => true,
                    'errors' => [],
                ],
                'data' => $leads,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
