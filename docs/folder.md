## Folder Structure

```bash
src/
├── Bootstrap
│   └── Application.php
├── Constants
│   └── HttpCodes.php
├── Controllers
│   ├── DefaultController.php
│   ├── NotFoundController.php
│   └── Rest
│       ├── PlateauController.php
│       └── RoverController.php
├── Core
│   ├── Helper.php
│   ├── Router.php
│   ├── RouterInterface.php
│   ├── Session.php
│   └── Storage.php
├── Entity
│   ├── EntityInterface.php
│   └── RoverEntity.php
├── Http
│   ├── HttpInterface.php
│   ├── Request.php
│   ├── RequestInterface.php
│   ├── Response.php
│   └── ResponseInterface.php
├── Mvc
│   ├── Controller.php
│   └── ControllerInterface.php
├── Nasa
│   ├── Action
│   │   ├── ActionInterface.php
│   │   ├── Move.php
│   │   └── Spin.php
│   ├── Command
│   │   ├── Command.php
│   │   ├── CommandCollection.php
│   │   ├── CommandCollectionInterface.php
│   │   └── CommandInterface.php
│   ├── Constants
│   │   ├── Commands.php
│   │   └── Directions.php
│   ├── Plateau
│   │   ├── Plateau.php
│   │   ├── PlateauFactory.php
│   │   ├── PlateauFactoryInterface.php
│   │   └── PlateauInterface.php
│   ├── Position
│   │   ├── Position.php
│   │   └── PositionInterface.php
│   └── Rover
│       ├── Controller
│       │   ├── AbstractController.php
│       │   ├── Controller.php
│       │   └── ControllerInterface.php
│       ├── Rover.php
│       ├── RoverFactory.php
│       ├── RoverFactoryInterface.php
│       └── RoverInterface.php
├── Repository
│   ├── PlateauRepository.php
│   ├── Repository.php
│   └── RoverRepository.php
└── Traits
    ├── InstanceTrait.php
    └── RequestTrait.php

18 directories, 47 files

```

---
### [Index](index) | [API](api)
