
from cgi import parse_qs, escape

import json

def application(environ, start_response):
    status = '200 OK'
    #elist=["%s: %s\n" % (k, environ[k]) for k in environ.keys()]

    request_body_size = int(environ.get('CONTENT_LENGTH', 0))
    request_body=environ['wsgi.input'].read(request_body_size)
    d = parse_qs(request_body)
    
    output = '%s' % json.dumps(d, indent=2)
    
    response_headers = [('Content-type', 'text/plain'),
                        ('Content-Length', str(len(output)))]
    start_response(status, response_headers)
    return [output]

