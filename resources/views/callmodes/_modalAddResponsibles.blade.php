<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Adicionar responsáveis</h4>
        </div>
        <div class="modal-body" style="max-height: 400px; overflow: scroll">
            <table class="table table-sm table-responsible">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td style="line-height: 26px;">{{ $user->name }}</td>
                        <td style="text-align: right;">
                            {!! Form::open(['route'=>['callmodes.addresponsible', 'id'=>$callmode->id], 'method'=>'post']) !!}
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Adicionar</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    
    </div>
</div>