<h1 align="center">TrydeX</h1>

<p float="center">
  <img src="https://user-images.githubusercontent.com/44779327/216434075-e5df7132-ff2a-492a-aefb-9044753ad355.png" width="400">
  <img src="https://user-images.githubusercontent.com/44779327/216434183-86ee68fd-7b08-44fc-b67c-135d6fa355da.png" width="400">
</p>

![image](https://user-images.githubusercontent.com/44779327/216434792-cb5bf3c5-5645-4c1f-90ef-bbdca8df001d.png)


### Особенности

- Без рекламы
- Без JavaScript
- Специальные запросы
- Несколько цветовых тем
- Поддерживает POST и GET запросы
- Никакие сторонние библиотеки / фреймворки не используются

## Размещение сайта TrydeX

Clone TrydeX

```bash
git clone https://github.com/lencodigitexer/trydex.git
```

Change opensearch.xml to point to your domain

```bash
cd trydex
sed -i 's/http:\/\/localhost/https:\/\/your.domain/g' opensearch.xml
```
Building a docker image

```bash
docker build -t trydex .
```

Running the docker image

```bash
docker run --rm -p 80:80 --name trydex trydex
```

Теперь TrydeX должен быть запущен!
