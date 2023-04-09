build:
	docker build -t trydex .
run:
	docker run --rm -p 80:80 --name trydex trydex
start:
	docker run -p 80:80 --name trydex trydex
stop:
	docker stop trydex
	docker rm trydex