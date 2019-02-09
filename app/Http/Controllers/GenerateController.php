<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Expertise;
use App\Models\Major;
use Carbon\Carbon;
use App\Models\TypeLesson;
use Auth;
use App\Models\Generate;

class GenerateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showgen($level, $major, $expertise, $gen)
    {
        $showexpert = Expertise::find($gen);
        $major1 = Teacher::all();
        $generate = Generate::orderBy('start')->get();
        if (Auth::user()->role->id == 1) {
            $gens = Generate::where('major_id', $major)->orWhereNull('major_id')->orderBy('day')->get();
        }else {
            $gens = Generate::where('user_id', Auth::user()->id)->where('role_id', Auth::user()->role->id)->where('major_id', $major)->orWhereNull('major_id')->orderBy('day')->get();

        }

        return view('curriculums.generates.create', compact(['showexpert', 'major1', 'gens','generate']));
    }

    public function showmix($level, $major, $gen)
    {
        $mixcurriculum = Major::find($gen);

        $read = Generate::where('major_id', 1)->where('role_id', 2)->update(['read' => 1]);

        return view('curriculums.generates.index', compact(['mixcurriculum', 'read']));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kosong = Generate::whereNull('lesson_id')->where('start', substr($request->start, 0, 8))->first();
        if ($kosong) {
            $kosong->delete();
        }

        if ($request->lesson_id == 3) {
            $this->validate($request, [
                'day'   => 'required',
                'start' => 'required',
                'major_id' => 'required'
            ]);
            $sesi = 30 ;
            $create = new Generate;
            $create->day = $request->day;
            $create->start = substr($request->start, 0, 8);
            $create->end = Carbon::parse(substr($request->start, 0, 8))->addMinutes($sesi);
            $create->user_id = Auth::user()->id;
            $create->role_id = Auth::user()->role->id;
            $create->major_id = $request->major_id;
            $create->save();

            $generates = Generate::where('day', $request->day)->where('role_id', Auth::user()->role->id)->where('major_id', $request->major_id)->get();
            foreach ($generates as $generate) {
                if ($generate->id != $create->id) {
                    $generate->start = Carbon::parse($generate->start)->subMinutes(15);
                    $generate->end = Carbon::parse($generate->end)->subMinutes(15);
                    $generate->save();
                }
            }

        } else {
            $this->validate($request, [
                'day'   => 'required',
                'start' => 'required',
                'teacher_id' => 'required',
                'room_id' => 'required',
                'lesson_id' => 'required',
                'major_id' => 'required'
            ]);
            
            if ($request->start != '07:00:00') {
                if ($request->sesi == 2) {
                    $c = Carbon::parse(substr($request->start, 0, 8));

                    $parent = new Generate;
                    $parent->day = $request->day;
                    $parent->start = $c->format('H:i:s');
                    $parent->end = $c->addMinutes(45);
                    $parent->teacher_id = $request->teacher_id;
                    $parent->room_id = $request->room_id;
                    $parent->lesson_id = $request->lesson_id;
                    $parent->generate_id = $request->generate_id;
                    $parent->major_id = $request->major_id;
                    $parent->user_id = Auth::user()->id;
                    $parent->role_id = Auth::user()->role->id;
                    $parent->save();

                    $create = new Generate;
                    $create->day = $request->day;
                    $create->start = $c->format('H:i:s');
                    $create->end = $c->addMinutes(45);
                    $create->teacher_id = $request->teacher_id;
                    $create->room_id = $request->room_id;
                    $create->lesson_id = $request->lesson_id;
                    $create->generate_id = $parent->id;
                    $create->major_id = $request->major_id;
                    $create->user_id = Auth::user()->id;
                    $create->role_id = Auth::user()->role->id;
                    $create->save();
                } else {
                    $create = new Generate;
                    $create->day = $request->day;
                    $create->start = substr($request->start, 0, 8);
                    $create->end = Carbon::parse(substr($request->start, 0, 8))->addMinutes(45);
                    $create->teacher_id = $request->teacher_id;
                    $create->room_id = $request->room_id;
                    $create->lesson_id = $request->lesson_id;
                    $create->major_id = $request->major_id;
                    $create->user_id = Auth::user()->id;
                    $create->role_id = Auth::user()->role->id;
                    $create->save();
                }
            } else {
                if ($request->sesi == 2) {
                    $c = Carbon::parse(substr($request->start, 0, 8));

                    $parent = new Generate;
                    $parent->day = $request->day;
                    $parent->start = $c->format('H:i:s');
                    $parent->end = $c->addMinutes(45);
                    $parent->teacher_id = $request->teacher_id;
                    $parent->room_id = $request->room_id;
                    $parent->lesson_id = $request->lesson_id;
                    $parent->generate_id = $request->generate_id;
                    $parent->major_id = $request->major_id;
                    $parent->user_id = Auth::user()->id;
                    $parent->role_id = Auth::user()->role->id;
                    $parent->save();

                    $create = new Generate;
                    $create->day = $request->day;
                    $create->start = $c->format('H:i:s');
                    $create->end = $c->addMinutes(45);
                    $create->teacher_id = $request->teacher_id;
                    $create->room_id = $request->room_id;
                    $create->lesson_id = $request->lesson_id;
                    $create->generate_id = $parent->id;
                    $create->major_id = $request->major_id;
                    $create->user_id = Auth::user()->id;
                    $create->role_id = Auth::user()->role->id;
                    $create->save();
                } else {
                    $create = new Generate;
                    $create->day = $request->day;
                    $create->start = substr($request->start, 0, 8);
                    $create->end = Carbon::parse(substr($request->start, 0, 8))->addMinutes(45);
                    $create->teacher_id = $request->teacher_id;
                    $create->room_id = $request->room_id;
                    $create->lesson_id = $request->lesson_id;
                    $create->major_id = $request->major_id;
                    $create->user_id = Auth::user()->id;
                    $create->role_id = Auth::user()->role->id;
                    $create->save();
                }
            }
        }

        return back()->with('sweetalert', 'Berhasil Menambah Data Atur Jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function editgen($level, $major, $expertise, $generate)
    {
        $edit = Generate::find($generate);
        $major1 = Major::all();
        $gens = Generate::where('role_id', Auth::user()->role->id)->orWhereNull('major_id')->orderBy('day')->orderBy('start')->get() ;
        return view('curriculums.generates.edit', compact(['edit','major1', 'gens']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateRead($id)
    {
        $read = Generate::find($id);

        $read->update(['read' => 1]);

        return redirect()->back();
    }

    public function edit($id)
    {
        // $edit = Generate::find($id);
        // return view('curriculums.generates.edit', compact('edit'));
    }

    public function expl($id, $gen)
    {
        $read = Generate::find($gen);

        $read->update(['generate_id' => null]);

        return redirect()->back();            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $current = Generate::find($id);
        if ($current->jamPelajaranSatuSesi()) {
            $this->validate($request, [
                'day'   => 'required',
                'start' => 'required',
                'teacher_id' => 'required',
                'room_id' => 'required',
                'lesson_id' => 'required',
                'major_id' => 'required'
            ]);

            $kosong = Generate::whereNull('lesson_id')->where('start', substr($request->start, 0, 8))->first();
            if ($kosong) {
                $kosong->delete();
            }

            $update = Generate::findOrFail($id);
            $update->major_id = $request->major_id;
            $update->teacher_id = null;
            $update->room_id = null;
            $update->lesson_id = null;
            $update->user_id = Auth::user()->id;
            $update->role_id = Auth::user()->role->id;
            $update->save();

            $sesi = 45 * $request->sesi;
            $create = new Generate;
            $create->day = $request->day;
            $create->start = substr($request->start, 0, 8);
            $create->end = Carbon::parse(substr($request->start, 0, 8))->addMinutes($sesi);
            $create->teacher_id = $request->teacher_id;
            $create->room_id = $request->room_id;
            $create->lesson_id = $request->lesson_id;
            $create->major_id = $request->major_id;
            $create->user_id = Auth::user()->id;
            $create->role_id = Auth::user()->role->id;
            $create->save();

        } else if($current->jamPelajaranDuaSesi()) {
            $start = Carbon::parse(substr($request->start, 0, 8));
            $satu = Generate::where('day', $request->day)
                        ->where('start', $start)
                        ->where('role_id', Auth::user()->role->id)
                        ->where('major_id', $current->major->id)
                        ->first();
            $next = $start->addMinutes(45);
            $dua = Generate::where('day', $request->day)
                        ->where('start', $next)
                        ->where('role_id', Auth::user()->role->id)
                        ->where('major_id', $current->major->id)
                        ->first();

            if (is_null($satu->teacher_id) and (is_null($dua) or is_null($dua->teacher_id))) {
                $satu->day = $request->day;
                $satu->start = substr($request->start, 0, 8);
                $satu->end = Carbon::parse(substr($request->start, 0, 8))->addMinutes(45);
                $satu->teacher_id = $request->teacher_id;
                $satu->room_id = $request->room_id;
                $satu->lesson_id = $request->lesson_id;
                $satu->major_id = $request->major_id;
                $satu->user_id = Auth::user()->id;
                $satu->role_id = Auth::user()->role->id;
                $satu->save();

                $c = Carbon::parse(substr($request->start, 0, 8))->addMinutes(45);

                if (is_null($dua)) {
                    $dua = new Generate;
                    $dua->day = $request->day;
                    $dua->start = $c->format('H:i:s');
                    $dua->end = $c->addMinutes(45);
                    $dua->teacher_id = $request->teacher_id;
                    $dua->room_id = $request->room_id;
                    $dua->lesson_id = $request->lesson_id;
                    $dua->generate_id = $satu->id;
                    $dua->major_id = $request->major_id;
                    $dua->user_id = Auth::user()->id;
                    $dua->role_id = Auth::user()->role->id;
                    $dua->save();
                } else {
                    $dua->day = $request->day;
                    $dua->start = $c->format('H:i:s');
                    $dua->end = $c->addMinutes(45);
                    $dua->teacher_id = $request->teacher_id;
                    $dua->room_id = $request->room_id;
                    $dua->lesson_id = $request->lesson_id;
                    $dua->generate_id = $satu->id;
                    $dua->major_id = $request->major_id;
                    $dua->user_id = Auth::user()->id;
                    $dua->role_id = Auth::user()->role->id;
                    $dua->save();
                }
                $lg = Generate::findOrFail($id);
                $lg->major_id = $request->major_id;
                $lg->teacher_id = null;
                $lg->room_id = null;
                $lg->lesson_id = null;
                $lg->user_id = Auth::user()->id;
                $lg->role_id = Auth::user()->role->id;
                $lg->save();

                $gc = $lg->generate;
                $gc->major_id = $request->major_id;
                $gc->teacher_id = null;
                $gc->room_id = null;
                $gc->lesson_id = null;
                $gc->generate_id = null;
                $gc->user_id = Auth::user()->id;
                $gc->role_id = Auth::user()->role->id;
                $gc->save();
            } else {
                dd('Tidak Bisa');
            }
        } else if($current->jamKosong()) {
            $update = Generate::findOrFail($id);
            $update->teacher_id = $request->teacher_id;
            $update->room_id = $request->room_id;
            $update->lesson_id = $request->lesson_id;
            $update->major_id = $request->major_id;
            $update->user_id = Auth::user()->id;
            $update->role_id = Auth::user()->role->id;
            $update->save();
        } else if($current->istirahat()) {
            $start = Carbon::parse(substr($request->start, 0, 8));
            $type = TypeLesson::find($request->lesson_id);
            $target = Generate::where('day', $request->day)
                        ->where('start', $start)
                        ->where('role_id', Auth::user()->role->id)
                        ->where('major_id', $current->major->id)
                        ->first();
            if ($target->jamKosong()) {
                $end = Carbon::parse($current->start)->subMinutes(15)->format('H:i:s');
                $new = Carbon::parse($target->end)->subMinutes(15)->format('H:i:s');
                $target->update([
                    'end' => $new
                ]);
                $current->update([
                    'start' => $end
                ]);
                $between = Generate::where('role_id', Auth::user()->role->id)
                            ->where('day', 'senin')
                            ->where('major_id', $current->major->id)
                            ->whereBetween('start', [$new, $end])
                            ->get();
                foreach ($between as $updated) {
                    if ($updated->id != $current->id) {
                        $a = Carbon::parse($updated->start)->subMinutes(15)->format('H:i:s');
                        $b = Carbon::parse($updated->end)->subMinutes(15)->format('H:i:s');
                        $updated->update([
                            'start' => $a,
                            'end' => $b
                        ]);
                    }
                }
            }
        }

        return redirect()->route('showmix.generate', [Auth::user()->role->name, $current->major->level->id, $current->major->id])->with('sweetalert', 'Berhasil Mengubah Data Atur Jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $generate = Generate::find($id);

        $generate->delete();

        return redirect()->route('showmix.generate', [Auth::user()->role->name, $generate->major->level->id, $generate->major->id])->with('sweetalert', 'Berhasil Menghapus Data Atur Jadwal');
    }
}
