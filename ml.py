import subprocess

from flask import Flask, render_template, json, request, jsonify
import requests
import scipy

app = Flask(__name__)

def calculate(candidate_pifs, reference_pifs):
    gain, offset, r_value, p_value, std_err = linregress(
        candidate_pifs, reference_pifs)
    return gain

