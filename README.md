Описание задачи:

Разработайте решение на PHP, которое позволит организовать очередь выполнения задач, определяемых сообщениями в очереди. Сообщение должно указывать как реализация будет использована для его обработки. Сообщения могут быть двух типов - асинхронные и последовательные. Асинхронные сообщения выполняются параллельно ограничиваясь параметром максимального кол-ва параллельных обработчиков.
Задание не подразумевает использование Rabbit MQ или аналогов. Может быть использована СУБД при необходимости.

Для отправки сообщений в очередь обработки можно реализовать страницу с формой отправки произвольного сообщения. Формат сообщений json.

Решение должно быть размещено на GitHub. Запуск должен производиться через docker контейнер, собираемый фалом конфигурации.

********

- Для асинхронной обработки можно использовать reactphp или ampphp или задача в том чтобы самому это реализовать это например через pcntl или open_proc

    - Web сервера достаточно для асинхронной обработки задач, если на нем реализована нужная функция, например как api метод

****

docker stop test && docker rm test && docker build -t mixcart-test . && docker run --name test -v $(pwd)/app:/var/www -d -p 80:80 mixcart-test

// todo перенести в entry point
docker exec test composer install
