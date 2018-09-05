build:
	docker build -t registry.gitlab.com/itforge-eros/it-ambassador .

push:
	docker push registry.gitlab.com/itforge-eros/it-ambassador