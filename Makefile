clean:
	echo "Cleaning"
	clear

sonarqube:
	./sonar-scanner/bin/sonar-scanner\   -Dsonar.projectKey=pimentT2\   -Dsonar.sources=.\   -Dsonar.host.url=http://sonarqube.ad.supalta.com\  -Dsonar.token=sqp_2e6d08bc66d4f9b04cf32f1bcdd2b6317c8c6c0f

