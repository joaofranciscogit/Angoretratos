<?php

  require_once './Source/Config/Class.php';

	define('DATA',
	[
    'ACCESS'	=> 'PRIVATE',
    'MASTER'	=> false,
    'MODULE'	=> null,
		'TITLE'		=> 'Angoretratos | Painel Administrativo',
		'META'		=> null
	]);

	$useAuth->dataAuth(DATA);
  $useAuth->dataValidate();

  var_dump($_SESSION['ACCOUNT']);

  echo $useAuth->dataValidate();

	require_once HTML.'Page/Page.php';
	#require_once HTML.'Header/Header.php';

?>

	<section class="container pt-5">
        <div class="row">
  
          <?php require_once HTML.'Aside/Aside.php'; ?>

          <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
              <h1 class="h4 pt-xl-1 pb-3">Painel Administrativo</h1>

              <h2 class="h6 text-primary mb-4">Dados Estatísticos</h2>

              <div class="row g-4 mb-4">
                
              <div class="col-md-6 col-xxl-3">
                  <div class="card card-body bg-purple bg-opacity-10 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                      <!-- Digit -->
                      <div>
                        <h2 class="h5 purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="1600" data-purecounter-delay="200" data-purecounter-duration="0">1600</h2>
                        <span class="mb-0 h6 fw-light">NOTÍCIAS</span>
                      </div>
                      <!-- Icon -->
                      <div class="mb-0"><i class="h2 bx bx-user text-primary"></i></div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-xxl-3">
                  <div class="card card-body bg-purple bg-opacity-10 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                      <!-- Digit -->
                      <div>
                        <h2 class="h5 purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="1600" data-purecounter-delay="200" data-purecounter-duration="0">1600</h2>
                        <span class="mb-0 h6 fw-light">VISITAS HOJE</span>
                      </div>
                      <!-- Icon -->
                      <div class="mb-0"><i class="h2 bx bx-user text-primary"></i></div>
                    </div>
                  </div>
                </div>

              </div>

              <canvas id="myChart2" width="400" height="130"></canvas>
              <script>
                const ctx2 = document.getElementById('myChart2');
                const myChart2 = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: ['SEG', 'TER', 'QUA', 'QUI', 'SEX', 'SAB', 'DOM'],
                        datasets: [{
                            label: 'SEMANA 1',
                            data: [
                            1,
                            2,
                            3,
                            4,
                            5,
                            6,
                            7
                            ],
                            backgroundColor: [
                                'rgba(37, 132, 236, 0.0)'
                            ],
                            borderColor: [
                                'rgba(37, 132, 236, 0.7)'
                            ],
                            borderWidth: 2
                        },
                        {
                            label: 'SEMANA 2',
                            data: [
                            10,
                            20,
                            30,
                            40,
                            50,
                            60,
                            70
                            ],
                            backgroundColor: [
                                'rgba(69, 107, 178, 0.0)'
                            ],
                            borderColor: [
                                'rgba(69, 107, 178, 0.7)'
                            ],
                            borderWidth: 2
                        },
                        {
                            label: 'SEMANA 3',
                            data: [
                            100,
                            200,
                            300,
                            400,
                            500,
                            600,
                            700
                            ],
                            backgroundColor: [
                                'rgba(124, 54, 146, 0.0)'
                            ],
                            borderColor: [
                                'rgba(124, 54, 146, 0.7)'
                            ],
                            borderWidth: 2
                        },
                        {
                            label: 'SEMANA 4',
                            data: [
                            1000,
                            2000,
                            3000,
                            4000,
                            5000,
                            6000,
                            7000
                            ],
                            backgroundColor: [
                                'rgba(70, 46, 144, 0.0)'
                            ],
                            borderColor: [
                                'rgba(70, 46, 144, 0.7)'
                            ],
                            borderWidth: 2
                        },]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
              </script>


            </div>
          </div>
        </div>
    </section>

<?php

	require_once HTML.'Footer/Footer.php';
	require_once HTML.'Page/PageEnd.php';

?>