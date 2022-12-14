<?php
include('user_cookie.php');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/8d0d2d9a42.js" crossorigin="anonymous"></script>
    <title>FAQ</title>

</head>

<body>
<div class="faq-container">
    <?php
    include('menu.php');
    ?>
    <main class="faq-main">
        <div class="title">
            <h2>FAQ</h2>
        </div>
        <section class="questions-and-answers">
            <div class="question">
                <p>W jaki sposób zarezerwować samochód?</p>
            </div>
            <div class="answer">
                <p>Samochód można zarezerwować przy pomocy naszej strony internetowej lub telefonicznie, zapraszamy do
                    kontaktu pod numerem: +48 791 371 715.</p>
            </div>
            <div class="question">
                <p>Jakie kryteria należy spełnić, żeby wynająć samochód.</p>
            </div>
            <div class="answer">
                <p>W przypadku wynajmu przez osobę fizyczną: samochód może wynająć każda osoba, która ukończyła 18 lat,
                    ma przy sobie ważne prawo jazdy oraz drugi dokument tożsamości (dowód osobisty, paszport). <br> <br>
                    W przypadku wynajmu przez firmę: aby wynająć samochód należy mieć ze sobą kompletu dokumentów
                    składających się z zaświadczenia NIP, zaświadczenia REGON, zaświadczenia Wpisu do Ewidencji
                    Działalności Gospodarczej lub zaświadczenia z KRS (nie starszy niż 3-miesięczny). Upoważnienie dla
                    osoby podpisującej umowę/odbierającej samochód do zawarcia zobowiązania w imieniu firmy.</p>
            </div>
            <div class="question">
                <p>Co w przypadku kiedy spowoduję szkodę komunikacyjną?</p>
            </div>
            <div class="answer">
                <p>W przypadku szkody spowodowane przez wynajmującego zostanie pobrana kaucja.</p>
            </div>
            <div class="question">
                <p>Czy wynajętym samochodem mogę wyjechać za granicę?</p>
            </div>
            <div class="answer">
                <p>Oczywiście, wyjazd za granice wynajętym samochodem jest możliwy po wcześniejszej pisemnej
                    zgodzie.</p>
            </div>
            <div class="question">
                <p>Czy samochód może prowadzić tylko osoba wynajmująca?</p>
            </div>
            <div class="answer">
                <p>Tak, samochód może prowadzić jedynie osoba, która podpisała umowę wynajmu z Electric Car Rent.</p>
            </div>
            <div class="question">
                <p>Czy otrzymam fakturę?</p>
            </div>
            <div class="answer">
                <p>Oczywiście, na życzenie wynajmującego wystawiamy faktury, w pozostałych przypadkach wystawiony
                    zostanie rachunek fiskalny.</p>
            </div>
            <div class="question">
                <p>Czy auto po każdym wynajmie oddajemy z pełnym bakiem?</p>
            </div>
            <div class="answer">
                <p>Oddając samochód w baku musi być tyle paliwa ile było w momencie jego odebrania.</p>
            </div>
        </section>
    </main>
</div>
</body>