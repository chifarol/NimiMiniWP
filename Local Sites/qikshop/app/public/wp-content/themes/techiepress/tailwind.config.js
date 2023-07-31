/** @type {import('tailwindcss').Config} */
export default {
  content: ["./*.php", "./**/*.php", "./**/**/*.php", "./**/**/**/*.php"],
  prefix: "tw-",
  screens: {
    xs: "100px",
    sm: "576px",
    md: "768px",
    lg: "992px",
    xl: "1200px",
    "2xl": "1400px",
  },
  variants: {
    textColor: ["responsive", "hover", "focus", "group-hover"],
  },
  theme: {
    colors: {
      success: "#04AF43",
      error: "#FF3333",
      white: "#ffffff",

      n1: "#101828",
      pc89: "#C8951A",
      ivory0: "#F8F7F1",
      ivory1: "#EBE9DE",
      ivory2b: "#E6E0C0",
      purple7: "#34224E",
      purple8: "#130627",
    },
    backgroundImage: {
      "gradient-1": "linear-gradient(180deg, #6A4FF4 0%, #5638EE 100%)",
      gd2: "linear-gradient(180deg, #8774E8 0%, #43329A 100%);",
    },
    gradientColorStops: (theme) => ({
      ...theme("colors"),
      purple1: "#6A4FF4",
      purple2: "#43329A",
    }),
    fontFamily: {
      morphend: ["Morphend", "serif"],
      mont: ["Montserrat", "serif"],
    },
    fontSize: {
      8: ["8px", "20px"],
      10: ["10px", "20px"],
      12: ["12px", "20px"],
      14: ["14px", "24px"],
      16: ["16px", "24px"],
      18: ["18px", "28px"],
      20: ["20px", "28px"],
      24: ["24px", "32px"],
      28: ["28px", "32px"],
      32: ["32px", "40px"],
      40: ["40px", "56px"],
      48: ["48px", "60px"],
      60: ["60px", "70px"],
      80: ["80px", "90px"],
      "80x": ["80px", "55px"],
      100: ["100px", "120px"],
      "100x": ["100px", "65px"],
      120: ["120px", "130px"],
    },
    fontWeight: {
      light: "300",
      normal: "400",
      medium: "500",
      semiBold: "600",
      bold: "700",
    },
    extend: {
      screens: {
        sm: { max: "576px" },
        md: { max: "780px" },
      },
      transitionProperty: {
        "max-height": "max-height",
      },
    },
  },
  plugins: [],
};
