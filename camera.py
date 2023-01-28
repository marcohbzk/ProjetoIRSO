import cv2 as cv
import sys
import os

camera = cv.VideoCapture(0)
delay = 5000

def gravarficheiro():
	cv.imwrite('files/images/webcam.jpg', image)
	
try:
	print("A capturar a imagem")
	ret, image = camera.read()
	gravarficheiro()


except KeyboardInterrupt:
	print("Programa terminado pelo utilizador!")

except:
	print("Ocorreu um erro", sys.exc_info())

finally:
	print("Fim do Programa")
	camera.release()
	cv.destroyAllWindows()
