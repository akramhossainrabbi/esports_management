<?php

namespace App\Http\Controllers;

use App\AddGame;
use App\AppUser;
use App\GameResult;
use App\StoreMatch;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function resultView(Request $request, $id)
    {
        $matchs = StoreMatch::leftjoin('all_games','game_id','store_match.match_game_id')->where('match_game_id', $id)->take(50)->orderBy('store_match_id','desc')->get();
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->get();
        return view('User.result')
            ->with('matchs',$matchs)
            ->with('users',$User)
            ->render();
    }

    public function searchResult(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $searched = $request->req;
            $data = StoreMatch::where('store_match_id', $searched)->first();
            $results = GameResult::where('result_match_id', $searched)->get();
            if ($results) {
                $output .= '<div class="row mt-3 bg-yellow">' .
                    '<div class="col-12 pt-1 pb-1 text-center">' .
                    '<strong>WINNER OF THE MATCH</strong>' .
                    '</div>' .
                    '</div>';
                $output .= '<div class="row mt-2">' .
                    '<div class="col-12 p-0 mt-2">' .
                    '<table class="table text-center" style="background-color: #212529">' .
                    '<thead class="thead-dark border-0">' .
                    '<tr>' .
                    '<th scope="col">#</th>' .
                    '<th scope="col">Player Name</th>' .
                    '<th scope="col">Kills</th>' .
                    '</tr>' .
                    '</thead>' .
                    '<tbody>';
                $i = 0;
                foreach ($results as $result){
                    $i++;
                    if ($result->winner==1){
                        if ($result->player_one_username && $result->player_two_username && $result->player_three_username && $result->player_four_username){
                            $output .= '<tr>' .
                                '<th scope="row">Team '.$i.'</th>' .
                                '<td>'.$result->player_one_username.'</td>' .
                                '<td>'.$result->player_one_kill.'</td>' .
                                '</tr>';
                            $output .= '<tr>' .
                                '<th scope="row"></th>' .
                                '<td>'.$result->player_two_username.'</td>' .
                                '<td>'.$result->player_two_kill.'</td>' .
                                '</tr>';
                            $output .= '<tr>' .
                                '<th scope="row"></th>' .
                                '<td>'.$result->player_three_username.'</td>' .
                                '<td>'.$result->player_three_kill.'</td>' .
                                '</tr>';
                            $output .= '<tr>' .
                                '<th scope="row"></th>' .
                                '<td>'.$result->player_four_username.'</td>' .
                                '<td>'.$result->player_four_kill.'</td>' .
                                '</tr>';
                        }elseif ($result->player_one_username && $result->player_two_username && $result->player_three_username){
                            $output .= '<tr>' .
                                '<th scope="row">'.$i.'</th>' .
                                '<td>'.$result->player_one_username.'</td>' .
                                '<td>'.$result->player_one_kill.'</td>' .
                                '</tr>';
                            $output .= '<tr>' .
                                '<th scope="row"></th>' .
                                '<td>'.$result->player_two_username.'</td>' .
                                '<td>'.$result->player_two_kill.'</td>' .
                                '</tr>';
                            $output .= '<tr>' .
                                '<th scope="row"></th>' .
                                '<td>'.$result->player_three_username.'</td>' .
                                '<td>'.$result->player_three_kill.'</td>' .
                                '</tr>';
                        }elseif ($result->player_one_username && $result->player_two_username){
                            $output .= '<tr>' .
                                '<th scope="row">'.$i.'</th>' .
                                '<td>'.$result->player_one_username.'</td>' .
                                '<td>'.$result->player_one_kill.'</td>' .
                                '</tr>';
                            $output .= '<tr>' .
                                '<th scope="row"></th>' .
                                '<td>'.$result->player_two_username.'</td>' .
                                '<td>'.$result->player_two_kill.'</td>' .
                                '</tr>';
                        }else{
                            $output .= '<tr>' .
                                '<th scope="row">'.$i.'</th>' .
                                '<td>'.$result->player_one_username.'</td>' .
                                '<td>'.$result->player_one_kill.'</td>' .
                                '</tr>';
                        }
                    }
                }
                $output .= '</tbody>' .
                    '</table>' .
                    '</div>' .
                    '</div>';
                $output .= '<div class="row mt-2 bg-yellow">' .
                    '<div class="col-12 pt-1 pb-1 text-center">' .
                    '<strong>FULL RESULT</strong>' .
                    '</div>' .
                    '</div>' .
                    '<div class="row mt-2">' .
                    '<div class="col-12 p-0 mt-2">' .
                    '<table class="table text-center" style="background-color: #212529">' .
                    '<thead class="thead-dark border-0">' .
                    '<tr>' .
                    '<th scope="col">#</th>' .
                    '<th scope="col">Player Name</th>' .
                    '<th scope="col">Kills</th>' .
                    '</tr>' .
                    '</thead>' .
                    '<tbody>';

                $i = 0;
                foreach ($results as $result){
                    $i++;
                    if ($result->player_one_username && $result->player_two_username && $result->player_three_username && $result->player_four_username){
                        $output .= '<tr>' .
                            '<th scope="row">'.$i.'</th>' .
                            '<td>'.$result->player_one_username.'</td>' .
                            '<td>'.$result->player_one_kill.'</td>' .
                            '</tr>';
                        $output .= '<tr>' .
                            '<th scope="row"></th>' .
                            '<td>'.$result->player_two_username.'</td>' .
                            '<td>'.$result->player_two_kill.'</td>' .
                            '</tr>';
                        $output .= '<tr>' .
                            '<th scope="row"></th>' .
                            '<td>'.$result->player_three_username.'</td>' .
                            '<td>'.$result->player_three_kill.'</td>' .
                            '</tr>';
                        $output .= '<tr>' .
                            '<th scope="row"></th>' .
                            '<td>'.$result->player_four_username.'</td>' .
                            '<td>'.$result->player_four_kill.'</td>' .
                            '</tr>';
                    }elseif ($result->player_one_username && $result->player_two_username && $result->player_three_username){
                        $output .= '<tr>' .
                            '<th scope="row">'.$i.'</th>' .
                            '<td>'.$result->player_one_username.'</td>' .
                            '<td>'.$result->player_one_kill.'</td>' .
                            '</tr>';
                        $output .= '<tr>' .
                            '<th scope="row"></th>' .
                            '<td>'.$result->player_two_username.'</td>' .
                            '<td>'.$result->player_two_kill.'</td>' .
                            '</tr>';
                        $output .= '<tr>' .
                            '<th scope="row"></th>' .
                            '<td>'.$result->player_three_username.'</td>' .
                            '<td>'.$result->player_three_kill.'</td>' .
                            '</tr>';
                    }elseif ($result->player_one_username && $result->player_two_username){
                        $output .= '<tr>' .
                            '<th scope="row">'.$i.'</th>' .
                            '<td>'.$result->player_one_username.'</td>' .
                            '<td>'.$result->player_one_kill.'</td>' .
                            '</tr>';
                        $output .= '<tr>' .
                            '<th scope="row"></th>' .
                            '<td>'.$result->player_two_username.'</td>' .
                            '<td>'.$result->player_two_kill.'</td>' .
                            '</tr>';
                    }else{
                        $output .= '<tr>' .
                            '<th scope="row">'.$i.'</th>' .
                            '<td>'.$result->player_one_username.'</td>' .
                            '<td>'.$result->player_one_kill.'</td>' .
                            '</tr>';
                    }

                }

                $output .= '</tbody></table></div></div>';
            }else{
                $output .= '<span class="text-center"><strong>Result not Published!</strong></span>';
            }
            return Response($output);
        }
    }




}
