import subprocess

from flask import Flask, render_template, json, request, jsonify
import requests
import scipy

app = Flask(__name__)

def calculate(candidate_pifs, reference_pifs):
    gain, offset, r_value, p_value, std_err = linregress(
        candidate_pifs, reference_pifs)
    return gain

@app.route("/system/function")
def gain():
    carts = request.body['cartid']
    product = request.body['productid']
    calculate(carts, product)
    return gain

if __name__ == "__main__":
    app.run()
