<?php
    session_start(); 

    include_once "GlobalVariables.php";
    
    if ($_SESSION['auth'] == true): ?>
	<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Main.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Task Manager</title>
    </head>
    <body>
        <div class="container" id="scroll-bar">
            <nav class="head">
                <a href="#" class="logo">Task Manager</a>
                
                <div class="profile-dropdown">
                    <div class="profile-dropdown-btn" onclick="toggleMenu()">
                        <span class="username">
                            Icky 73ddy
                            <i class="fa fa-angle-down" id="angle"></i>
                        </span>
                    </div>
                    <ul class="profile-dropdown-list" id="subMenu">
                        <li class="profile-dropdown-list-item">
                            <a href="" class="setting-link" lang="ru"><i class="fa-solid fa-sliders"></i>Настройки</a>
                        </li>
                        <hr color=#303030>    
                        <li class="profile-dropdown-list-item">
                        <a href="" class="logout-link" lang="ru"><i class="fa-solid fa-arrow-right-from-bracket"></i>Выйти</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="left-side">  </div>

            <div class="right-side">  </div>
            
            <div class="main">
                <div class="border-menu">
                    <button class="create-task" lang="ru">
                        Создать задачу
                    </button>
                    <ul class="border-menu-sections" lang="ru">
                        <li class="border-menu-sections-item">
                            <a href="#" class="border-menu-sections-item-link tasks-link" onclick="activeTasksPage()" lang="ru">Все задачи</a>
                        </li>
                        <li class="border-menu-sections-item">
                            <a href="#" class="border-menu-sections-item-link projects-link" onclick="activeProjectsPage()" lang="ru">Проекты</a>
                        </li>
                    </ul>
                </div>
                <div class="work-space">
                    <div class="task">
                        <div class="cnt-task-title" lang="ru">
                            <span class="task-title">                            
                                <i class="task-name fa-solid fa-tags"></i>
                                Очень длинный тайтл
                            </span>
                            <span class="task-status">
                                В работе
                            </span>
                        </div>
                        <div class="task-options">
                            <div class="ellipsis"  onclick="toggleTaskOptions()">
                                <i class="fa-solid fa-ellipsis-vertical fa-sm"></i>
                            </div>
                            <div class="cnt-task-options-dropdown-list" id="subOptions">
                                <ul class="task-options-dropdown-list">
                                    <li class="task-options-dropdown-list-item" id="button1">
                                        <a href="" lang="ru">Поменять статус</a>
                                    </li>
                                    <hr color=#303030>    
                                    <li class="task-options-dropdown-list-item" id="button2">
                                    <a href="" lang="ru">Удалить</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="cnt-task-description" lang="ru">
                            <p class="task-description" lang="ru">
                                Необходимо разработать новый функционал для приложения "Мой Дневник", 
                                который позволит пользователям создавать и сохранять список задач на день, неделю и месяц. 
                                Требуется добавить возможность установки приоритета для каждой задачи, 
                                оповещения о приближающихся сроках выполнения и отображения выполненных задач.
                                Необходимо разработать новый функционал для приложения "Мой Дневник", 
                                который позволит пользователям создавать и сохранять список задач на день, неделю и месяц. 
                                Требуется добавить возможность установки приоритета для каждой задачи, 
                                оповещения о приближающихся сроках выполнения и отображения выполненных задач.
                            </p>
                        </div>
                        <div class="task-data" lang="ru">
                            <span class="task-authors">
                                Авторы:
                                <br>
                                <span class="task-second-color task-info">Mike Jordan</span>
                            </span>
                            <span class="task-projects">
                                Проект:
                                <br>
                                <span class="task-second-color task-info">Reverse polarity</span>
                            </span>
                            <div class="task-date">
                                Срок сдачи:
                                <br>
                                <span class="task-second-color task-info">12.06.1991</span>
                            </div>
                        </div>
                        <div class="expand-angle">
                            <i class="fa-solid fa-angle-down exp-angle"></i>
                        </div>
                    </div>
                    <!-- <div class="cnt-modal" lang="ru">
                        <div class="modal">
                            <div class="modal-title">Очень длинный тайтл</div>
                            <div class="modal-close"><i class="fa-solid fa-xmark fa-lg"></i></div>
                            <div class="modal-description">
                                Необходимо разработать новый функционал для приложения "Мой Дневник", 
                                который позволит пользователям создавать и сохранять список задач на день, неделю и месяц. 
                                Требуется добавить возможность установки приоритета для каждой задачи, 
                                оповещения о приближающихся сроках выполнения и отображения выполненных задач.
                                Необходимо разработать новый функционал для приложения "Мой Дневник", 
                                который позволит пользователям создавать и сохранять список задач на день, неделю и месяц. 
                                Требуется добавить возможность установки приоритета для каждой задачи, 
                                оповещения о приближающихся сроках выполнения и отображения выполненных задач.
                            </div>
                            <div class="modal-data">Данные:</div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="footer" id="link-bio">
                <a href="https://github.com/73ddy-io" class="signature">Created by 73ddy</a>
            </div>
        </div>
        <!-- <div class="overlay"></div> -->
        <script src = "script.js"></script>
        <script src = "smooth-scrollbar.js"></script>
    </body>
    </html>
<?php elseif ($_SESSION['auth'] == false): ?>
	<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Main.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Task Manager</title>
    </head>
    <body>
        <div class="main-access-denied">
            <p class="access-denied">
                Access denied!
            </p>
        </div>
        <!-- <div class="overlay"></div> -->
        <script src = "script.js"></script>
    </body>
    </html>
<?php endif; ?>


