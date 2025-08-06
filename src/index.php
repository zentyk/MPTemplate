<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-fluid">
      <section>
          <h1>PHP Basics</h1><br/>
          <p>The price is: <?php $var = 123; echo $var; ?></p>
      </section>
      <br>
      <section>
          <h2>Variables and Constants</h2><br>
          <?php
          $title = 'Hello';
          const CONSTITLE = 3;

          printf("Hello, %s!", CONSTITLE);
          ?>
      </section>
      <br>
      <section>
          <h2>Datatypes</h2><br/>
          <h3>Strings</h3>
          <?php
            $price = '$42';

            $text = "This ticket costs \"".$price."\"";

            echo "<p>$text</p>";
          ?>

          <h3>Numbers</h3>
          <?php
            //Numbers can be integers, decimals or with exponents
            $skillLevel = 85.5;
            $confindentLevel = 5E+1;

            echo "<p>Skill of $skillLevel% with confidence of $confindentLevel</p>";
          ?>

          <h3>Booleans and <b>IF</b> sentences</h3>
          <?php
              $competentEnough = ($skillLevel >=100) && ($skillLevel <=200);

              if ($competentEnough) {
                  echo "<p>Competent with level of $skillLevel</p>";
              } else {
                  echo "<p>Not Competent due to a level of $skillLevel</p>";
              }
              echo var_dump($competentEnough);
          ?>
      </section>
      <br>
      <section>
          <h2>Arrays and for Loops</h2><br>
          <?php
            $roles = ['buyer','seller','admin'];

            echo "<h2>For</h2>";

            for ($i = 0; $i < count($roles); $i++) {
                echo "<p>lap $roles[$i].</p>";
            }

            echo "<h2>Asociative Arrays and Foreach</h2>";

            $languages = [
                'PHP'=>'pi eich pi!',
                'HTML' => 'eich ti em el'
            ];

            foreach ($languages as $index => $language) {
                echo "<p>$index language $language.</p>";
            }
          ?>
      </section>
      <br>
      <section>
          <h2>Functions</h2>
          <?php
          $title = 'Hello';
          function add(string $title, int $margin=3): string {
              return "<p class=\"m-$margin\">$title</p>";
          }

          $markup = add('Global-Ticket',5);
          echo $markup;
          ?>
      </section>
  </div>  
</body>
</html>