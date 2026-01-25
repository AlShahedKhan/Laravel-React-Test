import React from "react";
import Carousel from "../components/Carousel";
import ShopBy from "../components/ShopBy";
import GenInfo, { Brands } from "../components/GenInfo";

const Home = () => {
  return (
    <div className="max-w-screen-xl xs:w-[95vw] xs:max-w-[95vw] md:w-full mx-auto py-10 bg-white shadow-lg">
      <Carousel />
      <GenInfo />
      <Brands />
      <div className="md:w-full md:max-w-full xs:mx-2 sm:mx-auto grid gap-10 md:grid-cols-2 md:items-start md:px-3 mt-5">
        <div className="prose prose-2xl rounded-3xl border border-gray-300 bg-gradient-to-br from-white to-gray-50 p-8 shadow-2xl hover:shadow-lg transition-all hover:-translate-y-1">
          <ShopBy title="Best Sellers" filter="bestSellers" />
        </div>
        <div className="prose prose-2xl rounded-3xl border border-gray-300 bg-gradient-to-br from-white to-gray-50 p-8 shadow-md hover:shadow-xl transition-all hover:-translate-y-1">
          <ShopBy title="Top Rated" filter="topRated" />
        </div>
      </div>
    </div>
  );
};

export default Home;
