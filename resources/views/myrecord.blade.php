@extends('template.master')

@section('content')
<section class="bg-white">
    <div class="container">
        <div class="row py-3 text-center">

            <div class="col-4">
            <div class="card card-record">
                <img class="card-img" src="img/arenttest/dish.png" alt="">
                <div class="card-img-overlay card-img-overlay-record">
                <div class="group-text-center">
                    <div class="card-text px-1 text-yellow">
                    <small>BODY RECORD</small>
                    </div>
                    <div class="card-text bg-primary px-1 text-white">
                        <small>自分のカラダの記録</small>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-4">
            <div class="card card-record">
                <img class="card-img" src="img/arenttest/dish.png" alt="">
                <div class="card-img-overlay card-img-overlay-record">
                <div class="group-text-center">
                    <div class="card-text px-1 text-yellow">
                    <small>MY EXERCISE</small>
                    </div>
                    <div class="card-text bg-primary px-1 text-white">
                        <small>自分の運動の記録</small>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-4">
            <div class="card card-record">
                <img class="card-img" src="img/arenttest/dish.png" alt="">
                <div class="card-img-overlay card-img-overlay-record">
                <div class="group-text-center">
                    <div class="card-text px-1 text-yellow">
                    <small>MY DIARY</small>
                    </div>
                    <div class="card-text bg-primary px-1 text-white">
                        <small>自分の日記</small>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </div>
        </div>
    </section>

    <section id="my-record">
        <div class="container">
        <img src="img/arenttest/my-record.png" class="img-fluid" alt="">
        </div>
    </section>

    <section id="my-exercise" class="py-4">
        <div class="container">
        <div>MY EXERCISE</div>
        <div class="table-exercise table-responsive">
            <table class="table table-custom-dark">
            <tbody>
                <tr>
                    <th>&#9900;</th>
                    <td>Make breakfast (Stand up)</td>
                    <td class="text-yellow">26kcal</td>
                    <td class="text-yellow">10 minutes</td>
                </tr>
                <tr>
                    <th>&#9900;</th>
                    <td>Make breakfast (Stand up)</td>
                    <td class="text-yellow">26kcal</td>
                    <td class="text-yellow">10 minutes</td>
                </tr>
                <tr>
                    <th>&#9900;</th>
                    <td>Make breakfast (Stand up)</td>
                    <td class="text-yellow">26kcal</td>
                    <td class="text-yellow">10 minutes</td>
                </tr>
                <tr>
                <th>&#9900;</th>
                <td>Make breakfast (Stand up)</td>
                <td class="text-yellow">26kcal</td>
                <td class="text-yellow">10 minutes</td>
                </tr>
                <tr>
                <th>&#9900;</th>
                <td>Make breakfast (Stand up)</td>
                <td class="text-yellow">26kcal</td>
                <td class="text-yellow">10 minutes</td>
                </tr>
                <tr>
                <th>&#9900;</th>
                <td>Make breakfast (Stand up)</td>
                <td class="text-yellow">26kcal</td>
                <td class="text-yellow">10 minutes</td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>
    </section>

    <section>
        <div class="container">
        <div>MY DIARY</div>
        <div class="row mb-3">
            <div class="col-sm-3">
            <div class="diary-box">
                <div class="medium">05.21.2022</div>
                <div class="medium">12:23</div>
                <div class="small text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde atque, dolorem possimus sequi id nesciunt error cum doloribus obcaecati beatae!</div>
            </div>
            </div>

            <div class="col-sm-3">
            <div class="diary-box">
                <div class="medium">05.21.2022</div>
                <div class="medium">12:23</div>
                <div class="small text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde atque, dolorem possimus sequi id nesciunt error cum doloribus obcaecati beatae!</div>
            </div>
            </div>

            <div class="col-sm-3">
            <div class="diary-box">
                <div class="medium">05.21.2022</div>
                <div class="medium">12:23</div>
                <div class="small text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde atque, dolorem possimus sequi id nesciunt error cum doloribus obcaecati beatae!</div>
            </div>
            </div>

            <div class="col-sm-3">
            <div class="diary-box">
                <div class="medium">05.21.2022</div>
                <div class="medium">12:23</div>
                <div class="small text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde atque, dolorem possimus sequi id nesciunt error cum doloribus obcaecati beatae!</div>
            </div>
            </div>

        </div>

        <div class="text-center">
            <button class="btn btn-primary text-white">コラムをもっと見る</button>
        </div>

    </div>
</section>
@stop