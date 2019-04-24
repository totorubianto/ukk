<div class="container">
  <main>
      <header>
        <h1>Boarding pass</h1>
        <div>
          <h5>Flight n°</h5>
          <p> VY1812</p>
        </div>
        <div>
          <h5>Gate</h5>
          <p> D26</p>
        </div>
      </header>
      <section class="flight--general">
        <div>
          <h4>Munich</h4>
          <h2>MUC</h2>
        </div>
        <div>
          <h4>to</h4>
        </div>
        <div>
          <h4>Barcelona</h4>
          <h2>BCN</h2>
        </div>
      </section>
      <section class="flight--TimeInfo">
        <div>
          <h5>Boarding</h5>
          <p>18:20</p>
        </div>
        <div>
          <h5>Departure</h5>
          <p>19:00</p>
        </div>
        <div>
          <h5>Date</h5>
          <p>15/10/2017</p>
        </div>
      </section>
      <section class="flight--PassInfo">
        <div>
          <h5>Passenger</h5>
          <p>Victor Janin</p>
        </div>
        <div>
          <h5>Seat</h5>
          <p>23A</p>
        </div>
      </section>
      <section class="flight--qrcode"><img src="http://cdnqrcgde.s3-eu-west-1.amazonaws.com/wp-content/uploads/2013/11/jpeg.jpg"></section>
      
      
</main>
</div>
<style type="text/css">
  


section, header {
  display: flex;
  background-color: white;
}
section > div, header > div {
  padding: 10px 10px;
}
@media (max-width: 500px) {
  section > div:first-child, header > div:first-child {
    padding: 10px 10px 10px 0;
  }
}



.flight--general {
  text-align: center;
  align-items: center;
}
.flight--general div:first-of-type, .flight--general div:last-of-type {
  flex: 1 50%;
}
.flight--general div:first-child {
  padding: 10px 10px;
}
.flight--qrcode {
  justify-content: center;
  align-items: center;
  height: 30vh;
}
.flight--qrcode img {
  -o-object-fit: contain;
  object-fit: contain;
  font-family: "object-fit: contain";
  height: 100%;
}

.extra--meteo p:last-of-type {
  font-size: 0.8rem;
}
.extra--image {
  height: 100%;
  display: block;
  padding: 0;
}
.extra--image img {
  -o-object-fit: cover;
  object-fit: cover;
  font-family: "object-fit: cover";
  max-height: 100%;
  min-width: 100%;
}

header {
  background-color: #ff4500;
  color: #f9ebd2;
  justify-content: flex-end;
  align-items: center;
}
header h1 {
  flex: 1 90%;
}
header h5 {
  color: #f9ebd2;
}
header > div {
  flex: 1 10%;
}
header > div:first-of-type {
  padding-left: 0;
}

@media (max-width: 500px) {
  section, header {
    padding: 10px 20px;
  }

  header {
    flex-wrap: wrap;
  }

  .extra--image {
    min-height: inherit;
  }

  .flight--general {
    display: -webkit-flex;
    display: -ms-flex;
    display: flex;
    align-items: center;
  }
  .flight--general div:first-of-type {
    text-align: left;
    padding-left: 0;
  }
  .flight--general div:last-of-type {
    text-align: right;
    padding-right: 0;
  }

  .extra--meteo {
    flex-direction: column;
  }
  .extra--meteo > div {
    width: 100%;
    padding-left: 0;
  }
  .extra--image img {
    height: auto;
    max-height: -webkit-fill-available;
  }
}
@media (min-width: 501px) {
  section, h1, header div:first-of-type {
    padding: 10px 20px;
  }

  .flight--general {
    padding-bottom: 0;
  }

  .flight--TimeInfo {
    padding-top: 0;
  }

  .flight--qrcode {
    padding: 0 10px;
  }

  .extra--meteo {
    justify-content: space-around;
  }
  .extra--meteo > div {
    max-width: 30%;
  }
  .extra--meteo > div:last-of-type {
    padding-right: 0;
  }
}
@media (min-width: 1024px) {
  .flight--TimeInfo {
    padding-top: 10px;
  }

  .flight--qrcode {
    padding: 0 10px;
  }
}
main {
  
  display: grid;
  
  
}

header {
  border-radius: 10px 10px 0 0;
}
@media (max-width: 500px) {
  header {
    border-radius: 0;
  }
}

.flight--qrcode {
  border-radius: 0 0 10px 0;
}
@media (max-width: 500px) {
  .flight--qrcode {
    border-radius: 0;
  }
}
.flight--general {
  border-radius: 0 0 0 10px;
}

.extra--meteo {
  border-radius: 10px;
}
.extra--image {
  display: flex;
}

@media (min-width: 501px) and (max-width: 1023px) {
  .flight--TimeInfo {
    border-radius: 0 0 0 10px;
  }
  .flight--general {
    border-radius: 0;
  }
  .flight--qrcode {
    justify-content: flex-end;
  }
}
@media (min-width: 501px) {
  main {
    height: 100vh;
  }

  .flight--qrcode {
    height: 100%;
    padding: 0;
  }

  .extra--image {
    min-height: 100vh;
  }
}
@supports (display: grid) {
  @media (min-width: 501px) {
    .flight--qrcode {
      height: initial;
    }
  }
}
@supports not (display: grid) {
  main {
    margin: 0 auto;
    max-width: 500px;
    grid-gap: 0 0;
    display: block;
  }

  header {
    border-radius: 0;
  }
  @media (max-width: 500px) {
    header {
      border-radius: 0;
    }
  }

  .flight--qrcode {
    border-radius: 0;
  }
  @media (max-width: 500px) {
    .flight--qrcode {
      border-radius: 0;
    }
  }
  .flight--general {
    border-radius: 0;
  }

  .extra--meteo {
    border-radius: 0;
  }
  .extra--image {
    min-height: inherit;
    display: block;
  }

  @media (min-width: 501px) and (max-width: 1023px) {
    .flight--TimeInfo {
      border-radius: 0;
    }
    .flight--general {
      border-radius: 0;
    }
    .flight--qrcode {
      justify-content: center;
    }
  }
  @media (min-width: 501px) {
    main {
      height: inherit;
    }

    .flight--qrcode {
      height: initial;
    }

    .extra--image {
      min-height: inherit;
    }
  }
}
.extra--meteo {
  z-index: 2;
}
@media (min-width: 501px) {
  .extra--meteo {
    justify-self: center;
  }
}

@media (max-width: 500px) {
  main {
    grid-template-columns: 1fr  1fr;
  }

  header {
    grid-column: 1 / span 2;
    grid-row: 1 / span 1;
  }

  .flight--general, .flight--TimeInfo, .flight--PassInfo, .flight--qrcode {
    grid-column: 1 / span 2;
  }
  .flight--general {
    grid-row: 2 / span 1;
  }
  .flight--TimeInfo {
    grid-row: 3 / span 1;
  }
  .flight--PassInfo {
    grid-row: 4 / span 1;
  }
  .flight--qrcode {
    grid-row: 5 / span 1;
  }

  .extra--meteo, .extra--image {
    grid-row: 6 / span 1;
  }
  .extra--meteo {
    grid-column: 1 / span 1;
  }
  .extra--image {
    grid-column: 2 / span 1;
  }
}
@media (min-width: 501px) and (max-width: 1023px) {
  main {
    grid-template-columns: 1fr repeat(3, minmax(100px, 200px)) 1fr;
    grid-template-rows: 1fr 60px repeat(3, 75px) 10vh auto 1fr;
  }

  header {
    grid-column: 2 / span 3;
    grid-row: 2 / span 1;
    z-index: 2;
  }

  .flight--PassInfo, .flight--qrcode {
    z-index: 2;
  }
  .flight--general {
    grid-column: 2 / span 2;
    grid-row: 3 / span 1;
    z-index: 3;
  }
  .flight--TimeInfo {
    grid-column: 2 / span 2;
    grid-row: 5 / span 1;
    z-index: 3;
  }
  .flight--PassInfo {
    grid-column: 2 / span 2;
    grid-row: 4 / span 1;
  }
  .flight--qrcode {
    grid-column: 4 / span 1;
    grid-row: 3 / span 3;
  }

  .extra--meteo {
    grid-column: 2 / span 3;
    grid-row: 7 / span 1;
  }
  .extra--image {
    grid-column: 1 / span 7;
    grid-row: 1 / span 8;
  }
}
@media (min-width: 1024px) {
  main {
    grid-template-columns: 1fr repeat(4, 200px) 250px 1fr;
    grid-template-rows: 1fr 60px repeat(2, 100px) 0.5fr auto 1fr;
  }

  header {
    grid-column: 2 / span 5;
    grid-row: 2 / span 1;
    z-index: 2;
  }

  .flight--general, .flight--TimeInfo, .flight--PassInfo, .flight--qrcode {
    z-index: 2;
  }
  .flight--general {
    grid-column: 2 / span 2;
    grid-row: 3 / span 2;
  }
  .flight--TimeInfo {
    grid-column: 4 / span 2;
    grid-row: 3 / span 1;
  }
  .flight--PassInfo {
    grid-column: 4 / span 2;
    grid-row: 4 / span 1;
  }
  .flight--qrcode {
    grid-column: 6 / span 1;
    grid-row: 3 / span 2;
  }

  .extra--meteo {
    grid-column: 2 / span 5;
    grid-row: 6/span 1;
  }
  .extra--image {
    grid-column: 1 / span 7;
    grid-row: 1 / span 7;
    z-index: 1;
  }
}

</style>