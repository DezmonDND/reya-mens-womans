import "./ClipPaths.css";

function ClipPaths() {
  return (
    <div className="clip-paths">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="72"
        height="87"
        fill="none"
      >
        <clipPath id="specialists">
          <rect
            width="62"
            height="88"
            x="21.918"
            y="-7.949"
            fill="#BBA1FF"
            rx="31"
            transform="rotate(20 21.918 -7.95)"
          />
        </clipPath>
      </svg>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="226"
        height="775"
        fill="none"
      >
        <clipPath id="authors_big">
          <rect
            width="196.472"
            height="278.863"
            x="68.375"
            y="-27"
            fill="#BBA1FF"
            rx="98.236"
            transform="rotate(20 68.375 -27)"
          />
        </clipPath>
      </svg>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="172"
        height="210"
        fill="none"
      >
        <clipPath id="authors_middle">
          <rect
            width="150.161"
            height="213.131"
            x="51.895"
            y="-21"
            fill="#BBA1FF"
            rx="75.08"
            transform="rotate(20 51.895 -21)"
          />
        </clipPath>
      </svg>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="115"
        height="139"
        fill="none"
      >
        <clipPath id="authors_small">
          <rect
            width="98.938"
            height="140.428"
            x="35.027"
            y="-13"
            fill="#BBA1FF"
            rx="49.469"
            transform="rotate(20 35.027 -13)"
          />
        </clipPath>
      </svg>
    </div>
  );
}

export default ClipPaths;
