## API

### Plateau

#### `POST` plateau

Create Plateau

```bash
http://localhost:8080/api/v1/plateau
```

**Body**

```JSON
{
  "width": 5,
  "height": 5
}
```

**Example Request**

```bash
POST /api/v1/plateau HTTP/1.1
Host: localhost:8080
Content-Length: 35

{
    "width": 5,
    "height": 5
}
```

**Example Response**

```json
{
  "data": {
    "id": 1,
    "width": 5,
    "height": 5
  },
  "meta": {
    "timestamp": "2021-08-02T17:21:23+00:00",
    "hash": "a28aacd13b7b9034905cf14443fb22c3af4f6e92"
  }
}
```

#### `GET` plateaus

Plateaus Listing

```bash
http://localhost:8080/api/v1/plateaus
```

**Example Request**

```bash
GET /api/v1/plateaus HTTP/1.1
Host: localhost:8080
```

**Example Response**

```json
{
  "data": {
    "1": {
      "id": 1,
      "width": 5,
      "height": 5
    },
    "2": {
      "id": 2,
      "width": 5,
      "height": 5
    },
    ...
  },
  "meta": {
    "timestamp": "2021-08-02T17:22:48+00:00",
    "hash": "87f336f4a39e3370162f1d11d017455b961cb1a9"
  }
}
```

#### `GET` plateau/{id}

Get Plateau Details

```bash
http://localhost:8080/api/v1/plateau/{id}
```

**Example Request**

```bash
GET /api/v1/plateau/1 HTTP/1.1
Host: localhost:8080
```

**Example Response**

```json
{
  "data": {
    "id": 1,
    "width": 5,
    "height": 5
  },
  "meta": {
    "timestamp": "2021-08-02T17:24:47+00:00",
    "hash": "62c8d286b7de0fc43a4e00cb35fe939f39381bf3"
  }
}
```

**Example Error**

```json
{
  "errors": {
    "message": "Not Found"
  },
  "meta": {
    "timestamp": "2021-08-02T17:29:25+00:00",
    "hash": "654f5fc91090f3f81c58e5527ce589b5c27c2775"
  }
}
```

#### `PUT` plateau/{id}

Update Plateau

```bash
http://localhost:8080/api/v1/plateau/{id}
```

**Body**

```bash
{
  "width": 10,
  "height": 10
}
```

**Example Request**

```bash
PUT /api/v1/plateau/1 HTTP/1.1
Host: localhost:8080
Content-Length: 37

{
    "width": 10,
    "height": 10
}
```

**Example Response**

```json
{
  "data": {
    "id": 5,
    "width": 10,
    "height": 10
  },
  "meta": {
    "timestamp": "2021-08-02T17:26:04+00:00",
    "hash": "0e4f0384dfdff78d14737a2e4dcd7131d80619e2"
  }
}
```

**Example Error**

```json
{
  "errors": {
    "message": "Not Found"
  }
}
```

#### `DEL` plateau/{id}

Delete Plateau

```bash
http://localhost:8080/api/v1/plateau/{id}
```

**Example Request**

```bash
DELETE /api/v1/plateau/1 HTTP/1.1
Host: localhost:8080
```

**Example Response**

```json
{
  "data": {
    "id": 5,
    "width": 10,
    "height": 10
  },
  "meta": {
    "timestamp": "2021-08-02T17:27:59+00:00",
    "hash": "09917d442140874e5711ce614b2506418b9641fd"
  }
}
```

**Example Error**

```json
{
  "errors": {
    "message": "Not Found"
  }
}
```

### Rover

#### `POST` rover

Create Rover

```bash
http://localhost:8080/api/v1/rover
```

**Body**

```JSON
{
  "plateau_id": 1,
  "x": 1,
  "y": 2,
  "direction": "N"
}
```

**Example Request**

```bash
POST /api/v1/rover HTTP/1.1
Host: localhost:8080
Content-Type: application/json

{
    "plateau_id": 1,
    "x": 1,
    "y": 2,
    "direction": "N"
}

```

**Example Response**

```json
{
  "data": {
    "id": 1,
    "plateau_id": 1,
    "x": 1,
    "y": 2,
    "direction": "N"
  },
  "meta": {
    "timestamp": "2021-08-02T17:34:00+00:00",
    "hash": "2b24e56fbcb0e476543d62b1e37906df2fa0a756"
  }
}
```

**Example Error**

```json
{
  "errors": {
    "message": "Plateau Not Found"
  },
  "meta": {
    "timestamp": "2021-08-02T17:33:29+00:00",
    "hash": "4d6daa1ab3ded1dea9802634a1507aabcfffebb4"
  }
}
```

#### `GET` rovers

Rovers Listing

```bash
http://localhost:8080/api/v1/rovers
```

**Example Request**

```bash
GET /api/v1/rovers HTTP/1.1
Host: localhost:8080
```

**Example Response**

```json
{
  "data": {
    "1": {
      "id": 1,
      "plateau_id": 1,
      "x": 1,
      "y": 2,
      "direction": "N"
    },
    ...
  },
  "meta": {
    "timestamp": "2021-08-02T17:34:53+00:00",
    "hash": "7c5552cb4bc86b1c7c95c25a99e8aa46fb2667f9"
  }
}
```

#### `GET` rover/{id}

Get Rover Details

```bash
http://localhost:8080/api/v1/rover/{id}
```

**Example Request**

```bash
GET /api/v1/rover/1 HTTP/1.1
Host: localhost:8080
```

**Example Response**

```json
{
  "data": {
    "id": 5,
    "plateau_id": 5,
    "x": 1,
    "y": 2,
    "direction": "N"
  },
  "meta": {
    "timestamp": "2021-08-02T17:35:53+00:00",
    "hash": "0fbc4bbb952b1b4c038a18c81c8e695ddbf8590b"
  }
}
```

**Example Error**

```json
{
  "errors": {
    "message": "Rover Not Found"
  },
  "meta": {
    "timestamp": "2021-08-02T17:36:05+00:00",
    "hash": "cbe50701684a4c2c0db2f1d231be3bc4be389f36"
  }
}
```

.

#### `PUT` rover/{id}

Update Rover

```bash
http://localhost:8080/api/v1/rover/{id}
```

**Body**

```bash
{
    "plateau_id": 1,
    "x": 2,
    "y": 2,
    "direction": "E"
}
```

**Example Request**

```bash
PUT /api/v1/rover/1 HTTP/1.1
Host: localhost:8080
Content-Length: 37

{
    "width": 10,
    "height": 10
}
```

**Example Response**

```json
{
  "data": {
    "id": 1,
    "plateau_id": 1,
    "x": 2,
    "y": 2,
    "direction": "E"
  },
  "meta": {
    "timestamp": "2021-08-02T17:38:00+00:00",
    "hash": "fb84d638f7609bb0965b47bfeff1b13a41912e2c"
  }
}
```

**Example Error**

```json
{
  "errors": {
    "message": "Rover Not Found"
  }
}
```

#### `DEL` rover/{id}

Delete Rover

```bash
http://localhost:8080/api/v1/rover/{id}
```

**Example Request**

```bash
DELETE /api/v1/rover/1 HTTP/1.1
Host: localhost:8080
```

**Example Response**

```json
{
  "data": {
    "id": 5,
    "plateau_id": 5,
    "x": 2,
    "y": 2,
    "direction": "E"
  },
  "meta": {
    "timestamp": "2021-08-02T17:38:55+00:00",
    "hash": "028cdcc7ce921defca57ad69b1d916fe5859885d"
  }
}
```

**Example Error**

```json
{
  "errors": {
    "message": "Not Found"
  }
}
```

Also [Download bash File](Requests.http)

---

### [Index](index)
