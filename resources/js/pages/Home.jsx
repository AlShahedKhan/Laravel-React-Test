import React from "react";
import Carousel from "../components/Carousel";
import ShopBy from "../components/ShopBy";
import GenInfo, { Brands } from "../components/GenInfo";

const Home = () => {
  return (
    <div className="max-w-screen-xl xs:w-[95vw] xs:max-w-[95vw] md:w-full mx-auto py-9 bg-white shadow-2xl">
      <Carousel />
      <GenInfo />
      <Brands />
      <div className="md:w-full md:max-w-full xs:mx-2 sm:mx-auto grid gap-14 md:grid-cols-2 md:items-start md:px-6 mt-8">
        <div className="prose prose-2xl rounded-3xl border border-gray-500 bg-gradient-to-br from-white to-gray-50 p-7 shadow-md hover:shadow-2xl transition-all hover:-translate-y-1">
          <ShopBy title="Best Sellers" filter="bestSellers" />
        </div>
        <div className="prose prose-2xl rounded-3xl border border-gray-500 bg-gradient-to-br from-white to-gray-50 p-7 shadow-xl hover:shadow-md transition-all hover:-translate-y-1">
          <ShopBy title="Top Rated" filter="topRated" />
        </div>
      </div>
    </div>
  );
};

export default Home;
